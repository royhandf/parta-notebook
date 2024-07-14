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
    public $api_key;

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
        $this->api_key = "8af4f5a67bce98e321dd8885600a3278";
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
        $perPage = 12; // Number of products per page
        $currentPage = $this->request->getVar('page') ?? 1; // Get the current page from the query string, default to 1

        $totalProducts = $this->products->countAllResults(); // Get the total number of products
        $products = $this->products->select('products.*, categories.nama_kategori')
            ->join('categories', 'categories.id = products.category_id')
            ->orderBy('created_at', 'DESC')
            ->findAll($perPage, ($currentPage - 1) * $perPage); // Fetch products for the current page

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
            'currentPage' => $currentPage,
            'totalPages' => ceil($totalProducts / $perPage),
        ];

        return view('pages/user/products', $data);
    }

    public function filterProduct()
    {
        $category = $this->request->getVar('category');
        $rating = $this->request->getVar('rating');
        $priceMin = $this->request->getVar('price_min');
        $priceMax = $this->request->getVar('price_max');

        $query = $this->products->select('products.*');

        if (!empty($category)) {
            $query = $query->where('products.category_id', $category);
        } else {
            $query = $query->orderBy('products.category_nama_kategori', 'ASC');
        }

        if (!empty($rating)) {
            $query = $query->where('products.rating', $rating);
        } else {
            $query = $query->orderBy('products.rating', 'DESC');
        }

        if ($priceMin !== null && $priceMax !== null) {
            $query = $query->where('products.harga >=', $priceMin)
                ->where('products.harga <=', $priceMax);
        } else {
            $query = $query->orderBy('products.harga', 'ASC');
        }

        $products = $query->findAll();

        foreach ($products as $key => $product) {
            $products[$key]->images = $this->productImages->select('image')
                ->where('product_id', $product->id)
                ->first();
        }
        $data = [
            'products' => $products,
        ];

        return response()->setJSON($data);
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

        $reviewuser = $this->reviews
        ->where('product_id', $id)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($reviewuser as $key => $review) {
            $reviewuser[$key]->users = $this->userModel->find($review->user_id);
        }

        $review5star = $this->reviews
        ->where('product_id', $id)
        ->where('star', 5)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($review5star as $key => $review) {
            $review5star[$key]->users = $this->userModel->find($review->user_id);
        }

        $review4star = $this->reviews
        ->where('product_id', $id)
        ->where('star', 4)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($review4star as $key => $review) {
            $review4star[$key]->users = $this->userModel->find($review->user_id);
        }

        $review3star = $this->reviews
        ->where('product_id', $id)
        ->where('star', 3)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($review3star as $key => $review) {
            $review3star[$key]->users = $this->userModel->find($review->user_id);
        }

        $review2star = $this->reviews
        ->where('product_id', $id)
        ->where('star', 2)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($review2star as $key => $review) {
            $review2star[$key]->users = $this->userModel->find($review->user_id);
        }

        $review1star = $this->reviews
        ->where('product_id', $id)
        ->where('star', 1)
        ->orderBy('created_at', 'DESC')
        ->findAll();
        foreach ($review1star as $key => $review) {
            $review1star[$key]->users = $this->userModel->find($review->user_id);
        }

        // dd($detail);
        // dd($detail->images);
        // dd($reviewuser);

        $data = [
            'role' => session()->get('role'),
            'detailproducts' => $detail,
            'relatedproducts' => $relatedProducts,
            'products' => $products,
            'reviewusers' => $reviewuser,
            'review5stars' => $review5star,
            'review4stars' => $review4star,
            'review3stars' => $review3star,
            'review2stars' => $review2star,
            'review1stars' => $review1star,
            'totalreviews' => count($reviewuser),
            'total5stars' => count($review5star),
            'total4stars' => count($review4star),
            'total3stars' => count($review3star),
            'total2stars' => count($review2star),
            'total1stars' => count($review1star),
            'title' => 'Detail Product',
        ];

        return view('pages/user/detail-product', $data);
    }

    public function cart()
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

    public function checkout()
    {
        $api_key = $this->api_key;

        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        if ( empty($user->alamat)) {
            session()->setFlashdata('error', 'Address must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->kota_id)) {
            session()->setFlashdata('error', 'City must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->provinsi_id)) {
            session()->setFlashdata('error', 'Province must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->kode_pos)) {
            session()->setFlashdata('error', 'Postal code must be filled!');
            return redirect()->to('/account');
        } 

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

        $totalWeight = 0;
        foreach ($carts as $cart) {
            $totalWeight += $cart->product->berat * $cart->qty;
        }

        $origin = $this->userModel->where('role', 'admin')->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$origin->kota_id."&destination=".$user->kota_id."&weight=".$totalWeight."&courier=jne",
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key:".$api_key
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);

        if ($err) {
            $data['hasil'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results[0]->costs)) {
                $costs = $response_data->rajaongkir->results[0]->costs;
                $reg_service = null;
        
                foreach ($costs as $cost) {
                    if ($cost->service == "REG") {
                        $reg_service = $cost;
                        break;
                    }
                }
        
                if ($reg_service) {
                    $data['hasil'] = array(
                        'value' => $reg_service->cost[0]->value,
                        'etd' => $reg_service->cost[0]->etd
                    );
                }
            }
        }

        $ongkir = $data['hasil']['value'];
        $estimasi = $data['hasil']['etd'];

        $total = $subtotal + $ongkir;

        $totalberat = $totalWeight/1000;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$user->kota_id."&province=". $user->provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results)) {
                $result = $response_data->rajaongkir->results;
                $type = $result->type;
                $province = $result->province;
                $city = $result->city_name;
                $city_with_type = $type . " " . $city;

                $data['kota'] = array(
                    'province' => $province,
                    'city' => $city_with_type
                );
            }
        }

        if (empty($data['kota']['city'])) {
            $data['kota']['city'] = "City not set";
        }
        if (empty($data['kota']['province'])) {
            $data['kota']['province']= "Province not set";
        }

        $data = [
            'role' => session()->get('role'),
            'title' => 'Checkout',
            'carts' => $carts,
            'user' => $user,
            'subtotal' => $subtotal,
            'ongkir' => $ongkir,
            'total' => $total,
            'estimasi'=> $estimasi,
            'totalberat'=> $totalberat,
            'city'=> $data['kota']['city'],
            'province'=> $data['kota']['province'],
            'kodepos'=> $user->kode_pos,
        ];

        return view('pages/user/checkout', $data);
    }

    public function storeTransaction()
    {
        $api_key = $this->api_key;
        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();

        if ( empty($user->alamat)) {
            session()->setFlashdata('error', 'Address must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->kota_id)) {
            session()->setFlashdata('error', 'City must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->provinsi_id)) {
            session()->setFlashdata('error', 'Province must be filled!');
            return redirect()->to('/account');
        } else if ( empty($user->kode_pos)) {
            session()->setFlashdata('error', 'Postal code must be filled!');
            return redirect()->to('/account');
        }

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

        $totalWeight = 0;
        foreach ($carts as $cart) {
            $totalWeight += $cart->product->berat * $cart->qty;
        }

        $origin = $this->userModel->where('role', 'admin')->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$origin->kota_id."&destination=".$user->kota_id."&weight=".$totalWeight."&courier=jne",
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key:".$api_key,
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);

        if ($err) {
            $data['hasil'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results[0]->costs)) {
                $costs = $response_data->rajaongkir->results[0]->costs;
                $reg_service = null;
        
                foreach ($costs as $cost) {
                    if ($cost->service == "REG") {
                        $reg_service = $cost;
                        break;
                    }
                }
        
                if ($reg_service) {
                    $data['hasil'] = array(
                        'value' => $reg_service->cost[0]->value,
                        'etd' => $reg_service->cost[0]->etd
                    );
                }
            }
        }

        $ongkir = $data['hasil']['value'];

        // decrease stock
        foreach ($carts as $cart) {
            $product = $this->products->find($cart->product_id);
            $this->products->update($product->id, [
                'stok' => $product->stok - $cart->qty,
            ]);
        }

        $total = $subtotal + $ongkir;

        $data = [
            'id' => Uuid::uuid4(),
            'user_id' => $userId,
            'kode_transaksi' => 'INV/' . date('Ymd') . '/' . date('his') . '/' . rand(100, 999),
            'ongkir' => $ongkir,
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
        $api_key = $this->api_key;
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

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$user->kota_id."&province=". $user->provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota_user'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results)) {
                $result = $response_data->rajaongkir->results;
                $type = $result->type;
                $province = $result->province;
                $city = $result->city_name;
                $city_with_type = $type . " " . $city;

                $data['kota_user'] = array(
                    'province' => $province,
                    'city' => $city_with_type
                );
            }
        }

        if (empty($data['kota_user']['city'])) {
            $data['kota']['city'] = "City not set";
        }
        if (empty($data['kota_user']['province'])) {
            $data['kota']['province']= "Province not set";
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$admin->kota_id."&province=". $admin->provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota_admin'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results)) {
                $result = $response_data->rajaongkir->results;
                $type = $result->type;
                $province = $result->province;
                $city = $result->city_name;
                $city_with_type = $type . " " . $city;

                $data['kota_admin'] = array(
                    'province' => $province,
                    'city' => $city_with_type
                );
            }
        }

        if (empty($data['kota_admin']['city'])) {
            $data['kota']['city'] = "City not set";
        }
        if (empty($data['kota_admin']['province'])) {
            $data['kota']['province']= "Province not set";
        }

        $totalWeight = 0;
        foreach ($detail as $dtl) {
            $totalWeight += $dtl->product->berat * $dtl->qty;
        }

        $data = [
            'role' => session()->get('role'),
            'title' => 'Payment',
            'transaction' => $transaction,
            'details' => $detail,
            'admin' => $admin,
            'user' => $user,
            'ongkir' => $transaction->ongkir,
            'kota_user'=> $data['kota_user']['city'],
            'provinsi_user'=> $data['kota_user']['province'],
            'kodepos_user'=> $user->kode_pos,
            'kota_admin'=> $data['kota_admin']['city'],
            'provinsi_admin'=> $data['kota_admin']['province'],
            'kodepos_admin'=> $admin->kode_pos,
            'berat' => $totalWeight
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


    public function account()
    {
        $api_key = $this->api_key;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota'] = array('status' => 'error', 'message' => 'error');
        } else {
            $data['kota'] = json_decode($response);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['provinsi'] = array('status' => 'error', 'message' => 'error');
        } else {
            $data['provinsi'] = json_decode($response);
        }
        
        $id = session()->get('id');
        $user = $this->userModel->where('id', $id)->first();
        $data = [
            'role' => session()->get('role'),
            'title' => 'Account',
            'user' => $user,
            'kota' => $data['kota'],
            'provinsi' => $data['provinsi'],
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
            'kota_id' => $this->request->getPost('kota_id'),
            'provinsi_id' => $this->request->getPost('provinsi_id'),
            'kode_pos' => $this->request->getPost('kodepos'),
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
        $api_key = $this->api_key;

        $userId = session()->get('id');
        $user = $this->userModel->where('id', $userId)->first();
        $admin = $this->userModel->where('role', 'admin')->first();
        $transaction = $this->transactions->find($id);
        $details = $this->detailTransactions->where('transaction_id', $id)->findAll();

        foreach ($details as $detail) {
            $detail->product = $this->products->find($detail->product_id);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$user->kota_id."&province=". $user->provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota_user'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results)) {
                $result = $response_data->rajaongkir->results;
                $type = $result->type;
                $province = $result->province;
                $city = $result->city_name;
                $city_with_type = $type . " " . $city;

                $data['kota_user'] = array(
                    'province' => $province,
                    'city' => $city_with_type
                );
            }
        }

        if (empty($data['kota_user']['city'])) {
            $data['kota']['city'] = "City not set";
        }
        if (empty($data['kota_user']['province'])) {
            $data['kota']['province']= "Province not set";
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$admin->kota_id."&province=". $admin->provinsi_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota_admin'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);
            if (isset($response_data->rajaongkir->results)) {
                $result = $response_data->rajaongkir->results;
                $type = $result->type;
                $province = $result->province;
                $city = $result->city_name;
                $city_with_type = $type . " " . $city;

                $data['kota_admin'] = array(
                    'province' => $province,
                    'city' => $city_with_type
                );
            }
        }

        if (empty($data['kota_admin']['city'])) {
            $data['kota']['city'] = "City not set";
        }
        if (empty($data['kota_admin']['province'])) {
            $data['kota']['province']= "Province not set";
        }

        $totalWeight = 0;
        foreach ($details as $dtl) {
            $totalWeight += $dtl->product->berat * $dtl->qty;
        }

        $data = [
            'role' => session()->get('role'),
            'title' => 'Detail Transaction',
            'transaction' => $transaction,
            'details' => $details,
            'admin' => $admin,
            'user' => $user,
            'ongkir' => $transaction->ongkir,
            'kota_user'=> $data['kota_user']['city'],
            'provinsi_user'=> $data['kota_user']['province'],
            'kodepos_user'=> $user->kode_pos,
            'kota_admin'=> $data['kota_admin']['city'],
            'provinsi_admin'=> $data['kota_admin']['province'],
            'kodepos_admin'=> $admin->kode_pos,
            'berat' => $totalWeight,
        ];

        return view('pages/user/detail-transaction', $data);
    }

    public function responseCity()
    {
        $api_key = $this->api_key;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['kota'] = array('status' => 'error', 'message' => 'error');
        } else {
            $data['kota'] = json_decode($response);
        }
        print_r($data);

        return $data;
    }

    public function responseProvince()
    {
        $api_key = $this->api_key;
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key,
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $data['provinsi'] = array('status' => 'error', 'message' => 'error');
        } else {
            $data['provinsi'] = json_decode($response);
        }
        print_r($data);

        return $data;
    }

    public function responseCost()
    {
        $api_key = $this->api_key;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key:".$api_key
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);

        if ($err) {
            $data['hasil'] = array('status' => 'error', 'message' => 'error');
        } else {
            $response_data = json_decode($response);

            if (isset($response_data->rajaongkir->results[0]->costs)) {
                $costs = $response_data->rajaongkir->results[0]->costs;
                $reg_service = null;
        
                foreach ($costs as $cost) {
                    if ($cost->service == "REG") {
                        $reg_service = $cost;
                        break;
                    }
                }
        
                if ($reg_service) {
                    $data['hasil'] = array(
                        'rajaongkir' => array(
                            'results' => array(
                                array(
                                    'costs' => array($reg_service)
                                )
                            )
                        )
                    );
                } else {
                    $data['hasil'] = array('status' => 'error', 'message' => 'REG service not found');
                }
            } else {
                $data['hasil'] = array('status' => 'error', 'message' => 'No costs found');
            }
        }
        print_r($data);
        return $data;
    }
}