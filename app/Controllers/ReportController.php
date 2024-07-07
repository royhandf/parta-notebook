<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\DetailTransactionModel;

class ReportController extends BaseController
{
    protected $transactions;
    protected $detailTransactions;

    public function __construct()
    {
        $this->transactions = new TransactionModel();
        $this->detailTransactions = new DetailTransactionModel();
    }

    public function index()
    {
        $startDate = $this->request->getGet('startDate');
        $endDate = $this->request->getGet('endDate');
    
        if ($startDate && $endDate) {
            // Convert start and end dates to formatted strings
            $startFormatted = date('Y-m-d H:i:s', strtotime($startDate . ' 00:00:00'));
            $endFormatted = date('Y-m-d H:i:s', strtotime($endDate . ' 23:59:59'));
    
            // Filter transactions based on formatted date range
            $transactions = $this->transactions
                ->where('status', 'success')
                ->where('created_at >=', $startFormatted)
                ->where('created_at <=', $endFormatted)
                ->findAll();
        } else {
            $transactions = $this->transactions->where('status', 'success')->findAll();
        }

        foreach ($transactions as $key => $transaction) {
            $detailTransactions = $this->detailTransactions->select('detailtransactions.qty, products.harga')
                ->join('products', 'products.id = detailtransactions.product_id')
                ->where('transaction_id', $transaction->id)
                ->findAll();

            $totalQty = 0;
            $totalPrice = 0;

            foreach ($detailTransactions as $detailTransaction) {
                $totalQty += $detailTransaction->qty;
                $totalPrice += $detailTransaction->qty * $detailTransaction->harga;
            }

            $transactions[$key]->total_qty = $totalQty;
            $transactions[$key]->total_price = $totalPrice;

            $transactions[$key]->date = date('Y-m-d', strtotime($transaction->created_at));

            $transactions[$key]->total_price = 'Rp. ' . number_format($transactions[$key]->total_price, 0, ',', '.');
        }
        
        $data = [
            'role' => session()->get('role'),
            'transactions' => $transactions,
            'title' => 'Reports',
        ];

        return view('pages/dashboard/reports', $data);
    }
}