<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Products',
        ];

        return view('pages/dashboard/products', $data);
    }
}