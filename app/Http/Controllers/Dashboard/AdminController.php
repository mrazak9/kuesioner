<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.index', compact('pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }
    public function showProgress()
    {
        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();
        $progreses = Transaction::with('prospect')->whereHas('prospect', function ($query) {
            return $query->whereNotNull('id_registrant');
        })->paginate(10);

        return view('pages.dashboard.showProgress', compact('progreses', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    public function cekRegistrant($id)
    {

        $client = new Client();
        $res = $client->request('POST', 'https://lpkia.siakadcloud.com/live/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'lpkia',
                'client_secret' => '$ID_lPkia0',
            ]
        ]);

        if ($res->getStatusCode() == 200) { // 200 OK
            $body = json_decode($res->getBody(), true);
            $token = $body['access_token'];
            $url = 'https://lpkia.siakadcloud.com/live/datapendaftar/' . $id;

            $getregistrant = $client->request('GET', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            if ($getregistrant->getStatusCode() == 200) { // 200 OK
                $respon = json_decode($getregistrant->getBody(), true);

                $prospect = Prospect::Where('id_registrant',  $respon['kodependaftar'])->first();
                $trans = Transaction::Where('prospect_id',  $prospect->id)->first();
                // return $trans;

                $prospect->is_iput_form = $respon['isaktif'];
                $prospect->is_pay_form = $respon['isfinal'];
                $prospect->is_test = $respon['isditerima'];
                $prospect->is_pay_regist = $respon['isdaftarulang'];
                $prospect->save();

                if ($prospect->is_iput_form && !$prospect->is_pay_form) {
                    $status = 'Telah Mengisi Form';
                } elseif ($prospect->is_pay_form && !$prospect->is_test) {
                    $status = 'Berhak Test';
                } elseif ($prospect->is_test && !$prospect->is_pay_regist) {
                    $status = 'Lulus Tes/Sleksi';
                } elseif ($prospect->is_pay_regist) {
                    $status = 'Telah Melakukan registrasi';
                } else {
                    $status = 'Di Ajukan';
                }
                $trans->status = $status;
                //   return $prospect;
                $trans->save();

                $pmm = Transaction::Where('route', "PMM")->count();
                $ppg = Transaction::Where('route', "PPG")->count();
                $ppa = Transaction::Where('route', "PPA")->count();
                $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
                $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
                $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
                $prospects = Transaction::whereNotNull('status')->count();
                $progress = Prospect::whereNotNull('id_registrant')->count();

                $transUser = Transaction::where('user_id', $trans->user_id)->count();

                return view('pages.dashboard.prospect.detail', compact('trans', 'transUser', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
            }
        }
    }

    public function syncAll()
    {
        $progreses = Transaction::with('prospect')->whereHas('prospect', function ($query) {
            return $query->whereNotNull('id_registrant');
        })->get();

        $client = new Client();
        $res = $client->request('POST', 'https://lpkia.siakadcloud.com/live/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'lpkia',
                'client_secret' => '$ID_lPkia0',
            ]
        ]);

        if ($res->getStatusCode() == 200) { // 200 OK
            foreach ($progreses as $progres) {
                $body = json_decode($res->getBody(), true);
                $token = $body['access_token'];
                $url = 'https://lpkia.siakadcloud.com/live/datapendaftar/' . $progres->prospect->id_registrant;

                $getregistrant = $client->request('GET', $url, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);

                if ($getregistrant->getStatusCode() == 200) { // 200 OK
                    $respon = json_decode($getregistrant->getBody(), true);

                    $prospect = Prospect::Where('id_registrant',  $respon['kodependaftar'])->first();
                    $trans = Transaction::Where('prospect_id',  $prospect->id)->first();
                    // return $trans;

                    $prospect->is_iput_form = $respon['isaktif'];
                    $prospect->is_pay_form = $respon['isfinal'];
                    $prospect->is_test = $respon['isditerima'];
                    $prospect->is_pay_regist = $respon['isdaftarulang'];
                    $prospect->save();

                    if ($prospect->is_iput_form && !$prospect->is_pay_form) {
                        $status = 'Telah Mengisi Form';
                    } elseif ($prospect->is_pay_form && !$prospect->is_test) {
                        $status = 'Berhak Test';
                    } elseif ($prospect->is_test && !$prospect->is_pay_regist) {
                        $status = 'Lulus Tes/Sleksi';
                    } elseif ($prospect->is_pay_regist) {
                        $status = 'Telah Melakukan registrasi';
                    } else {
                        $status = 'Di Ajukan';
                    }
                    $trans->status = $status;
                    //   return $prospect;
                    $trans->save();
                }
            }
        }

        return redirect(route('admin.dashboard.progress'));
    }
}
