<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Homepage',
        ];

        return view('pages/user/home', $data);
    }

    public function products(): string
    {
        $data = [
            'title' => 'Products',
        ];

        return view('pages/user/products', $data);
    }

    public function detailProduct(): string
    {
        $data = [
            'title' => 'Detail Product',
        ];

        return view('pages/user/detail-product', $data);
    }

    public function cart(): string
    {
        $data = [
            'title' => 'Cart',
        ];

        return view('pages/user/cart', $data);
    }

    public function checkout(): string
    {
        $data = [
            'title' => 'Checkout',
        ];

        return view('pages/user/checkout', $data);
    }

    public function payment(): string
    {
        $data = [
            'title' => 'Payment',
        ];

        return view('pages/user/payment', $data);
    }

    public function account(): string
    {
        $data = [
            'title' => 'Account',
        ];

        return view('pages/user/account', $data);
    }

    public function feedback(): string
    {
        $data = [
            'title' => 'Feedback',
        ];

        return view('pages/user/feedback', $data);
    }

    public function detailTransaction(): string
    {
        $data = [
            'title' => 'Detail Transaction',
        ];

        return view('pages/user/detail-transaction', $data);
    }
}
