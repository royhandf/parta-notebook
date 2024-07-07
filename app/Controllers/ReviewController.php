<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ReviewModel;
use App\Models\ProductModel;

class ReviewController extends BaseController
{
    protected $reviews;
    protected $products;
    protected $users;

    function __construct()
    {
        $this->reviews = new ReviewModel();
        $this->products = new ProductModel();
        $this->users = new UserModel();
    }

    public function index(): string
    {
        $reviewcustomers = $this->reviews->select('reviews.*, products.nama_produk, users.nama_lengkap')
            ->join('products', 'products.id = reviews.product_id')
            ->join('users', 'users.id = reviews.user_id')
            ->findAll();

        $data = [
            'reviews' => $reviewcustomers,
            'title' => 'Reviews',
        ];

        return view('pages/dashboard/reviews', $data);
    }
}
