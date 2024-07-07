<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    protected $transaction;
    protected $product;

    public function __construct()
    {
        $this->transaction = new TransactionModel();
        $this->product = new ProductModel();
    }

    public function index()
    {
        $transact = $this->transaction->findAll();
        foreach ($transact as $key => $transaction) {
            $transact[$key]->user = $this->transaction->select('nama_lengkap')
                ->join('users', 'users.id = transactions.user_id')
                ->where('user_id', $transaction->user_id)
                ->first();
        }
        // join table detailtransactions and products
        foreach ($transact as $key => $transaction) {
            $transact[$key]->detailtransactions = $this->transaction->select('detailtransactions.product_id, products.nama_produk, products.variant, detailtransactions.qty')
                ->join('detailtransactions', 'detailtransactions.transaction_id = transactions.id')
                ->join('products', 'products.id = detailtransactions.product_id')
                ->where('transactions.id', $transaction->id)
                ->findAll();
        }
        $status = ['pending', 'success', 'canceled'];

        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'transactions' => $transact,
            'statuses' => $status,
            'title' => 'Transactions',
        ];

        return view('pages/dashboard/transactions', $data);
    }

    public function update($id)
    {
        $status = $this->request->getPost('status');
        $this->transaction->update($id, ['status' => $status]);
    
        // if status is canceled, then update the stock of the product from detail transaction
        if ($status == 'canceled') {
            $detailTransaction = $this->transaction->select('detailtransactions.product_id, detailtransactions.qty')
                ->join('detailtransactions', 'detailtransactions.transaction_id = transactions.id')
                ->where('transactions.id', $id)
                ->findAll();
    
            foreach ($detailTransaction as $detail) {
                $product = $this->product->select('stok')
                    ->where('id', $detail->product_id)
                    ->first();
    
                $this->product->update($detail->product_id, ['stok' => $product->stok + $detail->qty]);
            }
        }
    
        // set flashdata
        session()->setFlashdata('success', 'Transaction status has been updated');
    
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->transaction->delete($id);

        // set flashdata
        session()->setFlashdata('success', 'Transaction has been deleted');

        return redirect()->back();
    }
}
