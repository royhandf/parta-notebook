<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Categories',
        ];

        return view('pages/dashboard/categories_page', $data);
    }
}
