<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\TransactionModel;
use App\Models\ProductImagesModel;
use App\Models\DetailTransactionModel;

class DashboardController extends BaseController
{
    protected $categories;
    protected $products;
    protected $productImages;
    protected $users;
    protected $cart;
    protected $transactions;
    protected $detailTransactions;
    protected $review;

    public function __construct()
    {
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->productImages = new ProductImagesModel();
        $this->users = new UserModel();
        $this->cart = new CartModel();
        $this->transactions = new TransactionModel();
        $this->detailTransactions = new DetailTransactionModel();
    }

    public function index(): string
    {
        $transactions = $this->transactions->select('transactions.*, users.nama_lengkap')
            ->join('users', 'users.id = transactions.user_id')
            ->orderBy('transactions.created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $topSales = $this->detailTransactions->select('products.nama_produk, SUM(detailtransactions.qty) as total_qty')
            ->join('products', 'products.id = detailtransactions.product_id')
            ->groupBy('product_id')
            ->orderBy('total_qty', 'DESC')
            ->limit(5)
            ->findAll();

            $salesPerMonth = $this->detailTransactions->select('MONTH(transactions.created_at) as month, YEAR(transactions.created_at) as year, SUM(detailtransactions.qty) as total_qty, products.harga')
            ->join('transactions', 'transactions.id = detailtransactions.transaction_id')
            ->join('products', 'products.id = detailtransactions.product_id')
            ->where('transactions.status', 'success')
            ->groupBy('month, year, products.harga')
            ->orderBy('year', 'ASC')
            ->orderBy('month', 'ASC')
            ->findAll();
    
        $totalrevenue = 0;
        foreach ($salesPerMonth as $sale) {
            $totalrevenue += $sale->total_qty * $sale->harga;
        }

        $data = [
            'role' => session()->get('role'),
            'title' => 'Dashboard',
            'total_categories' => $this->categories->countAll(),
            'total_products' => $this->products->countAll(),
            'total_transactions' => $this->transactions->where('status', 'success')->countAllResults(),
            'total_users' => $this->users->where('role !=', 'Admin')->countAllResults(),
            'transactions' => $transactions,
            'sales_per_month' => $salesPerMonth,
            'top_sales' => $topSales,
            'total_revenue' => $totalrevenue,
        ];

        return view('pages/dashboard/index', $data);
    }
}
