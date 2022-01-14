<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index ()
    {       
        $data = null;
        $transactions = Transaction::with('Prospect')->get();
        return view('user.dashboard',[
            'transactions' => $transactions,
            'data' => $data
        ]);
    }
}
