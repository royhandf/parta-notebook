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
}
