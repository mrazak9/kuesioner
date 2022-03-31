<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Transaction::with('prospect')->orderBy('created_at', 'desc')->paginate(10);
        // dd($trans);

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.prospect.index', compact('trans', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        $trans = Transaction::with('Prospect')->where('id', $id)->first();
        $transUser = Transaction::where('user_id', $trans->user_id)->count();
        return view('pages.dashboard.prospect.edit', compact('trans', 'transUser', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    public function detail($id)
    {
        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        $trans = Transaction::where('id', $id)->first();
        $transUser = Transaction::where('user_id', $trans->user_id)->count();
        return view('pages.dashboard.prospect.detail', compact('trans', 'transUser', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($transId, Request $request)
    {
        // mapping request data
        $data = $request->all();
        $status = null;
        // dd($data);

        $transaction = Transaction::findorFail($transId);


        $prospect = Prospect::Where('id', $transaction->prospect_id)->first();

        $prospect->name = $data['name'];
        $prospect->phone = $data['phone'];
        $prospect->email = $data['email'];
        $prospect->address = $data['address'];
        $prospect->school = $data['school'];
        $prospect->city = $data['city'];
        $prospect->id_registrant = $data['id_registrant'];
        $prospect->is_iput_form = $data['is_iput_form'];
        $prospect->is_pay_form = $data['is_pay_form'];
        $prospect->is_test = $data['is_test'];
        $prospect->is_pay_regist = $data['is_pay_regist'];
        $prospect->route = $data['route'];
        $prospect->save();

        //   Save Transactoin
        if ($prospect->is_iput_form && !$prospect->is_pay_form) {
            $status = 'Telah Mengisi Form';
        } elseif ($prospect->is_pay_form && !$prospect->is_test) {
            $status = 'Berhak Test';
        } elseif ($prospect->is_test && !$prospect->is_pay_regist) {
            $status = 'Lulus Tes/Sleksi';
        } elseif ($prospect->is_pay_regist) {
            $status = 'Telah Melakukan registrasi';
        } else {
            $status = $data['status'];
        }
        $transaction->status = $status;
        //   return $prospect;
        $transaction->save();

        // Send Email to User
        // Mail::to($checkout->User->email)->send(new Paid($checkout));

        $request->session()->flash('success', "Prospect with ID {$prospect->name} has been updated");
        return redirect(route('admin.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Transaction $transaction)
    {

        $transaction = Transaction::find($id);
        $prospect = Prospect::find($transaction->prospect_id);

        // return $transaction;
        $prospect->delete();
        $transaction->delete();

        return view('pages.dashboard');
    }

    public function listPmm()
    {
        $listPmm = Transaction::Where('route', "pmm")->orderBy('created_at', 'desc')->paginate(10);
        // dd($listPmm);

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.prospect.listPmm', compact('listPmm', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    public function listPpg()
    {
        $listPpg = Transaction::Where('route', "PPG")->orderBy('created_at', 'desc')->paginate(10);
        // dd($listPmm);

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "PPA")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "PMM")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.prospect.listPpg', compact('listPpg', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }
    public function listPpa()
    {
        $listPpa = Transaction::Where('route', "PPA")->orderBy('created_at', 'desc')->paginate(10);
        // dd($listPmm);

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "PPA")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "PMM")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.prospect.listPpa', compact('listPpa', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // $trans = Transaction::with('prospect')->Where('id','like',"%".$cari."%")->paginate();
        $trans = Transaction::with('prospect')->whereHas('prospect', function ($query) use ($cari) {
            return $query->where('name', 'like', "%" . $cari . "%");
        })->paginate(10);

        // $trans = Transaction::with('prospect')->orderBy('created_at', 'desc')->paginate(10);
        // dd($trans);

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::whereNotNull('status')->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();
        if ($cari) {
            return view('pages.dashboard.prospect.index', compact('trans', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
        } else {
            return redirect('pages/dashboard/prospect');
        }
        // return $cari;
    }
}
