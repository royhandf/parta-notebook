<?php

namespace App\Controllers;

class ReviewController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Reviews',
        ];

        return view('pages/dashboard/reviews', $data);
    }
}
