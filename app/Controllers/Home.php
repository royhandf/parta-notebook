<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ReviewModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\TransactionModel;
use App\Models\ProductImagesModel;
use App\Models\DetailTransactionModel;

class Home extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;
    protected $userModel;
    protected $carts;
    protected $transactions;
    protected $detailTransactions;
    protected $reviews;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->userModel = new UserModel();
        $this->carts = new CartModel();
        $this->transactions = new TransactionModel();
        $this->detailTransactions = new DetailTransactionModel();
        $this->reviews = new ReviewModel();
    }

    public function index(): string
    {
        $latestproducts = $this->products->select('products.*')
            ->orderBy('created_at', 'DESC')
            ->findAll(6);

        foreach ($latestproducts as $key => $product) {
            $latestproducts[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->findAll();
        }

        // Retrieve products starting from the 7th one (excluding the latest ones)
        $products = $this->products->select('products.*')
        ->orderBy('created_at', 'DESC')
        ->findAll(999, 6); // Retrieve all products except the latest 6

        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->findAll();
        }

        $data = [
            'role' => session()->get('role'),
            'latestproducts' => $latestproducts,
            'products' => $products,
            'title' => 'Homepage',
        ];

        return view('pages/user/home', $data);
    }

    public function products(): string
    {
        $products = $this->products->select('products.*, categories.nama_kategori')
            ->join('categories', 'categories.id = products.category_id')
            ->findAll();

        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->first();
        }

        $data = [
            'role' => session()->get('role'),
            'products' => $products,
            'categories' => $this->categories->findAll(),
            'title' => 'Products',
        ];

        return view('pages/user/products', $data);
    }

    public function detailProduct($id)
    {
        $detail = $this->products->select('products.*')
            ->where('products.id', $id)
            ->first();

        foreach ($detail as $key => $product) {
            $detail->images = $this->productImages->select('image')
                ->where('product_id', $id)
                ->findAll();
        }
        
        // same category products
        $relatedProducts = $this->products->select('products.*')
            ->where('category_id', $detail->category_id)
            ->where('products.id !=', $id)
            ->findAll();

        foreach ($relatedProducts as $key => $related) {
            $relatedProducts[$key]->images = $this->productImages->select('image')
                ->where('product_id', $related->id)
                ->first();
        }

        $products = $this->products->select('products.*')
            ->orderBy('created_at', 'DESC')
            ->where('products.id !=', $id)
            ->findAll();

        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->findAll();
        }

        // dd($detail);
        // dd($detail->images);

        $data = [
            'role' => session()->get('role'),
            'detailproducts' => $detail,
            'relatedproducts' => $relatedProducts,
            'products' => $products,
            'title' => 'Detail Product',
        ];

        return view('pages/user/detail-product', $data);
    }

    public function cart(): string
    {
        $userId = session()->get('id');
        $cartcustomer = $this->carts->where('user_id', $userId)->findAll();

        // Retrieve product details for each cart item
        foreach ($cartcustomer as $cart) {
            $cart->product = $this->products->find($cart->product_id);
            $cart->image = $this->productImages->select('image')->where('product_id', $cart->product_id)->first();
        }

        $total = 0;
        foreach ($cartcustomer as $cart) {
            $total += $cart->total_harga;
        }

        $data = [
            'role' => session()->get('role'),
            'title' => 'Cart',
            'carts' => $cartcustomer,
            'total' => $total,
        ];

        return view('pages/user/cart', $data);
    }

    public function addCart($id)
    {
        $product = $this->products->where('id', $id)->first();
        $user = $this->userModel->find(session()->get('id'));
        $qty = $this->request->getPost('qty');

        if ($qty > $product->stok) {
            session()->setFlashdata('error', 'Stock not enough!');
            return redirect()->to('/detail-product/' . $id);
        }

        $this->carts->insert([
            'id' => Uuid::uuid4(),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'qty' => $qty,
            'total_harga' => $product->harga * $qty,
        ]);

        session()->setFlashdata('success', 'Product has been added to cart!');
        return redirect()->back();
    }

    public function updateCart($id)
    {
        $cart = $this->carts->find($id);
        $qty = $this->request->getPost('qty');
        $product = $this->products->where('id', $cart->product_id)->first();

        if ($qty > $product->stok) {
            session()->setFlashdata('error', 'Stock is not enough!');
            return redirect()->to('/cart');
        }

        $totalHarga = $product->harga * $qty;

        $this->carts->update($cart->id, [
            'qty' => $qty,
            'total_harga' => $totalHarga,
        ]);

        session()->setFlashdata('success', 'Product updated!');

        return redirect()->to('/cart');
    }

    public function deleteCart($id)
    {
        $cart = $this->carts->find($id);
        $this->carts->delete($cart->id);

        session()->setFlashdata('success', 'Product deleted!');
        return redirect()->to('/cart');
    }

    public function checkCart()
    {
        $userId = session()->get('id');
        $cart = $this->carts->where('user_id', $userId)->findAll();

        if (empty($cart)) {
            session()->setFlashdata('error', 'Cart is empty!');
            return redirect()->to('/products');
        }

        return redirect()->to('/checkout');
    }

    public function checkout(): string
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $carts = $this->carts->where('user_id', $userId)->findAll();

        // Retrieve product details for each cart item
        foreach ($carts as $cart) {
            $cart->product = $this->products->find($cart->product_id);
            $cart->image = $this->productImages->select('image')->where('product_id', $cart->product_id)->first();
        }

        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->total_harga;
        }

        $ongkir = 20000;

        $total = $subtotal + $ongkir;

        $data = [
            'role' => session()->get('role'),
            'title' => 'Checkout',
            'carts' => $carts,
            'user' => $user,
            'subtotal' => $subtotal,
            'ongkir' => $ongkir,
            'total' => $total,
        ];

        return view('pages/user/checkout', $data);
    }

    public function storeTransaction()
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();

        if ($user->alamat == null && $user->no_telp == null) {
            session()->setFlashdata('error', 'Address and phone number must be filled!');
            return redirect()->to('/account');
        }

        $carts = $this->carts->where('user_id', $userId)->findAll();

        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->total_harga;
        }

        // decrease stock
        foreach ($carts as $cart) {
            $product = $this->products->find($cart->product_id);
            $this->products->update($product->id, [
                'stok' => $product->stok - $cart->qty,
            ]);
        }

        $ongkir = 20000;

        $total = $subtotal + $ongkir;

        $data = [
            'id' => Uuid::uuid4(),
            'user_id' => $userId,
            'kode_transaksi' => 'INV/' . date('Ymd') . '/' . date('his') . '/' . rand(100, 999),
            'total_bayar' => $total,
            'status' => 'pending',
        ];

        $this->transactions->insert($data);

        foreach ($carts as $cart) {
            $this->detailTransactions->insert([
                'id' => Uuid::uuid4(),
                'transaction_id' => $data['id'],
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
            ]);
        }

        foreach ($carts as $cart) {
            $this->carts->delete($cart->id);
        }

        session()->setFlashdata('success', 'Please pay your order!');
        return redirect()->to('/payment');
    }

    public function payment()
    {
        $admin = $this->userModel->where('role', 'admin')->first();
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();

        $transaction = $this->transactions->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();
        if ($transaction == null) {
            session()->setFlashdata('error', 'No transaction found!');
            return redirect()->to('/cart');
        }

        $detail = $this->detailTransactions->where('transaction_id', $transaction->id)->findAll();

        foreach ($detail as $item) {
            $item->product = $this->products->find($item->product_id);
        }

        $ongkir = 20000;

        $data = [
            'role' => session()->get('role'),
            'title' => 'Payment',
            'transaction' => $transaction,
            'details' => $detail,
            'admin' => $admin,
            'user' => $user,
            'ongkir' => $ongkir,
        ];

        return view('pages/user/payment', $data);
    }

    public function cancelPayment($id)
    {
        $this->transactions->update($id, [
            'status' => 'canceled',
        ]);
        return redirect()->to('/payment');
    }

    public function verifyWhatsapp()
    {
        // Get the user ID from the session
        $userId = session()->get('id');

        $user = $this->userModel->find($userId);
        $admin = $this->userModel->where('role', 'admin')->first();

        $transac = $this->transactions->where('user_id', $userId)->orderBy('created_at', 'DESC')->first();

        // Prepare the message
        $message = "Halo,\n\nPesanan $transac->kode_transaksi atas nama $user->nama_lengkap sudah melakukan pembayaran. Mohon dicek dan diproses.\n\nTerima kasih.";

        // URL encode the message
        $message = urlencode($message);

        // Prepare the phone number
        $phoneNumber = $admin->no_telp; // Replace with the actual phone number

        // Generate the WhatsApp URL
        $whatsappUrl = "https://wa.me/$phoneNumber?text=$message";

        // Redirect to the WhatsApp URL
        return redirect()->to($whatsappUrl);
    }


    public function account(): string
    {
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();
        $data = [
            'role' => session()->get('role'),
            'title' => 'Account',
            'user' => $user,
        ];

        return view('pages/user/account', $data);
    }

    public function updateAccount()
    {
        $id = session()->get('id');
        $this->userModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        session()->setFlashdata('success', 'Data has been updated!');
        return redirect()->back();
    }

    public function updatePassword()
    {
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();

        if (password_verify((string)$this->request->getPost('old_password'), $user->password)) {
            $this->userModel->update($id, [
                'password' => password_hash((string)$this->request->getPost('new_password'), PASSWORD_DEFAULT),
            ]);
            session()->setFlashdata('success', 'Password berhasil diubah!');
            return redirect()->to('/account');
        } else {
            session()->setFlashdata('error', 'Password lama salah!');
            return redirect()->to('/account');
        }
    }

    public function feedback()
    {
        $userid = session()->get('id');
        $number = 5;

        $transactions = $this->transactions->where('user_id', $userid)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        $details = [];
        foreach ($transactions as $transaction) {
            $detail = $this->detailTransactions->where('transaction_id', $transaction->id)->findAll();
            foreach ($detail as $item) {
                $item->transactions = $transaction;
                $item->products = $this->products->find($item->product_id);
                $item->reviews = $this->reviews->where('user_id', $userid)
                ->where('transaction_id', $transaction->id)
                ->where('product_id', $item->product_id)
                ->first();
                $item->images = $this->productImages->select('image')->where('product_id', $item->product_id)->first();
                $details[] = $item;
            }
        }

        // dd($details);

        $data = [
            'role' => session()->get('role'),
            'title' => 'Feedback',
            'details' => $details,
            'numbers' => $number,
        ];

        return view('pages/user/feedback', $data);
    }

    public function storeFeedback()
    {
        $userid = session()->get('id');
        $productid = $this->request->getPost('product_id');
        $transactionid = $this->request->getPost('transaction_id'); 
        $star = $this->request->getPost('rating');

        // check if user already give feedback it can update
        $review = $this->reviews->where('user_id', $userid)
        ->where('product_id', $productid)
        ->where('transaction_id', $transactionid)
        ->first();
        if ($review) {
            $this->reviews->update($review->id, [
                'star' => $star,
                'description' => $this->request->getPost('review'),
            ]);

            $totalRating = $this->reviews->select('star')->where('product_id', $productid)->findAll();
            $total = 0;
            foreach ($totalRating as $rate) {
                $total += $rate->star;
            }

            $rating = $total / count($totalRating);

            $this->products->update($productid, [
                'rating' => $rating,
            ]);

            session()->setFlashdata('success', 'Feedback has been updated!');
            return redirect()->to('/feedback');
        }
        
        $this->reviews->insert([
            'id' => Uuid::uuid4(),
            'user_id' => $userid,
            'product_id' => $productid,
            'transaction_id' => $transactionid,
            'star' => $star,
            'description' => $this->request->getPost('review'),
        ]);

        $totalRating = $this->reviews->select('star')->where('product_id', $productid)->findAll();
        $total = 0;
        foreach ($totalRating as $rate) {
            $total += $rate->star;
        }

        $rating = $total / count($totalRating);

        $this->products->update($productid, [
            'rating' => $rating,
        ]);

        session()->setFlashdata('success', 'Feedback has been sent!');
        return redirect()->to('/feedback');
    }

    public function detailTransaction($id)
    {
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $admin = $this->userModel->where('role', 'admin')->first();
        $transaction = $this->transactions->find($id);
        $details = $this->detailTransactions->where('transaction_id', $id)->findAll();

        foreach ($details as $detail) {
            $detail->product = $this->products->find($detail->product_id);
        }

        $ongkir = 20000;

        $data = [
            'role' => session()->get('role'),
            'title' => 'Detail Transaction',
            'transaction' => $transaction,
            'details' => $details,
            'admin' => $admin,
            'user' => $user,
            'ongkir' => $ongkir,
        ];

        return view('pages/user/detail-transaction', $data);
    }
}
