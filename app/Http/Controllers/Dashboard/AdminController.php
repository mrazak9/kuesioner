<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::Where('status', "Di Ajukan")->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();
        return view('pages.dashboard.index', compact('pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }
}