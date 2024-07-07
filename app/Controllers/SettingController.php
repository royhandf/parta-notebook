<?php

namespace App\Controllers;

use App\Models\UserModel;

class SettingController extends BaseController
{
    protected $admin;

    function __construct()
    {
        $this->admin = new UserModel();
    }

    public function index(): string
    {
        $data = [
            'admin' => $this->admin->where('nama_lengkap', session()->get('nama_lengkap'))->first(),
            'title' => 'Settings',
        ];
        return view('pages/dashboard/settings', $data);
    }

    public function update($id)
    {
        $this->admin->update($id, [
            'bank' => $this->request->getPost('bank'),
            'no_rek' => $this->request->getPost('no_rek')
        ]);

        session()->setFlashdata('success', 'Data has been updated!');
        return redirect()->back();
    }
}
