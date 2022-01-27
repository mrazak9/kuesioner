<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\People;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Index ()
    {
        $data=null;
        switch (Auth::user()->occupation) {
            case 'Mahasiswa':
                $data = "PMM";
                break;
            case 'Guru' : 
                $data = "PPG";
                break;   
            case 'Alumni' :
                $data = 'PPA';
                break;       
            case 'Dosen' :
                $data = 'Dosen';
                break;       
            default:
                $data;
                break;
        }
        if ($data=='Dosen') {
            $transactions = Transaction::with('Prospect')->Where('wali_id',Auth::id())->get();
            return view('user.dashboard_dosen',[
                'transactions' => $transactions,
            ]);
        } else {
            $transactions = Transaction::with('Prospect')->Where('user_id',Auth::id())->get();
            return view('user/dashboard',[
                'transactions' => $transactions,
                'data' => $data,
            ]);
        }       
    }
}
