<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderByDesc('trx_date')->limit(5)->get();
        return view('admin.dashboard', ['transactions' => $transactions]);
    }
}
