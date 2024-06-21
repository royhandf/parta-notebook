<?php

namespace App\Controllers;

class SettingController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Setting',
        ];

        return view('pages/dashboard/settings', $data);
    }
}
