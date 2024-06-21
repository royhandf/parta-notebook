<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Transactions',
        ];

        return view('pages/dashboard/transactions', $data);
    }
}
