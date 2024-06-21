<?php

namespace App\Controllers;

class ReportController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Reports',
        ];

        return view('pages/dashboard/reports', $data);
    }
}