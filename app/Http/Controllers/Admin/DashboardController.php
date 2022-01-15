<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index ()
    {       
        $data = null;
        $transactions = Transaction::with('Prospect')->get();
        return view('admin.dashboard',[
            'transactions' => $transactions,
            'data' => $data
        ]);
    }

    public function View ()
    {       
        $data = null;
        $users = User::with('People')->get();
        return view('admin.view_user',[
            'users' => $users,
            'data' => $data
        ]);
    }
}
