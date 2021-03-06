<?php
// Note: Untuk PPG Partisipasi GURU

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\People;
use App\Models\Prospect;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Transactoin\Store;
use App\Http\Requests\User\Transactoin\StorePMM;
use App\Http\Requests\User\Transactoin\StorePPA;
use App\Http\Requests\User\Transactoin\StorePPG;

class TransactoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function createPpg(Request $request)
    {
        // return $user;
        $transactions = Transaction::with('Prospect')->Where('user_id',Auth::id())->get();
        $count= $transactions->count();
        if ($count == 10) {
            $request->session()->flash('error',"Tidak dapat menambah data, karena Anda Telah memiliki data lebih dari 10");
            return redirect(route('user.dashboard'));
        }

        if (Auth::user()) {
            return view('transaction/ppg');
        }else {
            return view('transaction/ppg_guest');
        }
    }
    public function createPpa(Request $request)
    {
        // return $user;
        $transactions = Transaction::with('Prospect')->Where('user_id',Auth::id())->get();
        $count= $transactions->count();
        if ($count == 10) {
            $request->session()->flash('error',"Tidak dapat menambah data, karena Anda Telah memiliki data lebih dari 10");
            return redirect(route('user.dashboard'));
        }
        if (Auth::user()) {
            return view('transaction/ppa_user');
        }else {
            return view('transaction/ppa');
        }
    }
    public function createPmm(Request $request)
    {
        // return $user;
        $transactions = Transaction::with('Prospect')->Where('user_id',Auth::id())->get();
        $count= $transactions->count();
        if ($count == 10) {
            $request->session()->flash('error',"Tidak dapat menambah data, karena Anda Telah memiliki data lebih dari 10");
            return redirect(route('user.dashboard'));
        }

        if (Auth::user()) {
            return view('transaction/pmm');
        }else {

            return view('transaction/pmm_guest');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ppgStore(Store $request)
    {
        $getUser = People:: findorFail(Auth::id());
         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
         $data['status'] = 'Di Ajukan';
         $data['period'] = date ('Y');
         $data['route']='PPG';
         $data['wali_id']=$getUser->id_user;

         // create prospect
         $prospect = new Prospect();
         $prospect->name = $data['name'];
         $prospect->phone = $data['phone'];
         $prospect->email = $data['email'];
         $prospect->school = $data['school'];
         $prospect->address = $data['address'];
         $prospect->city = $data['city'];
         $prospect->route = 'PPG';
         $prospect->owner = $data['user_id'];
         $prospect->save();

         $data['prospect_id'] = $prospect->id;

         // create checkout
         $checkout = Transaction::create($data);
        //  $this->getSnapRedirect($checkout);

         return redirect(route('transaction.success'));
    }

    public function ppgStore_guest(StorePPG $request)
    {
        // mapping request data
        $data = $request->all();

        // create person
        $person = new People();
        $person->name = $data['user_name'];
        $person->phone = $data['user_phone'];
        $person->school_origin = $data['school_origin'];
        $person->id_user = $data['wali_id'];
        $person->save();

        // create user
        $user = new User();
        $user->name = $data['user_name'];
        $user->email = $data['user_email'];
        $user->occupation = 'Guru';
        $user->people_id = $person->id;
        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->save();

        $data['user_id'] = $user->id;
        $data['status'] = 'Di Ajukan';
        $data['period'] = date ('Y');
        $data['route']='PPG';

        // create prospect
        $prospect = new Prospect();
        $prospect->name = $data['name'];
        $prospect->phone = $data['phone'];
        $prospect->email = $data['email'];
        $prospect->school = $data['school'];
        $prospect->address = $data['address'];
        $prospect->city = $data['city'];
        $prospect->route = $data['route'];
        $prospect->owner = $data['user_id'];
        $prospect->save();

        $data['prospect_id'] = $prospect->id;

        // create transaction
        $transaction = Transaction::create($data);
        //  $this->getSnapRedirect($transaction);

        return redirect(route('transaction.success'));
    }

    public function ppaStore(StorePPA $request)
    {
        // return  $request->all();
        // mapping request data
        $data = $request->all();

        // create person
        $person = new People();
        $person->name = $data['user_name'];
        $person->nim = $data['nim'];
        $person->phone = $data['user_phone'];
        $person->school_origin = $data['prodi_asal'];
        $person->graduation_year = $data['year'];
        $person->save();

        // create user
        $user = new User();
        $user->name = $data['user_name'];
        $user->email = $data['user_email'];
        $user->occupation = 'Alumni';
        $user->people_id = $person->id;
        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->save();

        $data['user_id'] = $user->id;
        $data['status'] = 'Di Ajukan';
        $data['period'] = date ('Y');
        $data['route']='PPA';

        // create prospect
        $prospect = new Prospect();
        $prospect->name = $data['name'];
        $prospect->phone = $data['phone'];
        $prospect->email = $data['email'];
        $prospect->school = $data['school'];
        $prospect->address = $data['address'];
        $prospect->city = $data['city'];
        $prospect->route = 'PPA';
        $prospect->owner = $data['user_id'];
        $prospect->save();

        $data['prospect_id'] = $prospect->id;

        // create transaction
        $transaction = Transaction::create($data);
        //  $this->getSnapRedirect($transaction);

        return redirect(route('transaction.success'));
    }

    public function ppaStoreUser(Store $request)
    {
        // return  $request->all();
        // mapping request data
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['status'] = 'Di Ajukan';
        $data['period'] = date ('Y');
        $data['route']='PPA';

        // create prospect
        $prospect = new Prospect();
        $prospect->name = $data['name'];
        $prospect->phone = $data['phone'];
        $prospect->email = $data['email'];
        $prospect->school = $data['school'];
        $prospect->address = $data['address'];
        $prospect->city = $data['city'];
        $prospect->route = 'PPG';
        $prospect->owner = $data['user_id'];
        $prospect->save();

        $data['prospect_id'] = $prospect->id;

        // create transaction
        $transaction = Transaction::create($data);
        //  $this->getSnapRedirect($transaction);

        return redirect(route('transaction.success'));

    }

    public function pmmStore(Store $request)
    {

         $getUser = People:: findorFail(Auth::id());
         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
         $data['status'] = 'Di Ajukan';
         $data['period'] = date ('Y');
         $data['route']='PMM';
         $data['wali_id']=$getUser->id_user;

         // create prospect
         $prospect = new Prospect();
         $prospect->name = $data['name'];
         $prospect->phone = $data['phone'];
         $prospect->email = $data['email'];
         $prospect->school = $data['school'];
         $prospect->address = $data['address'];
         $prospect->city = $data['city'];
         $prospect->route = 'PPG';
         $prospect->owner = $data['user_id'];
         $prospect->save();

         $data['prospect_id'] = $prospect->id;

         // create checkout
         $checkout = Transaction::create($data);
        //  $this->getSnapRedirect($checkout);

         return redirect(route('transaction.success'));
    }

    public function pmmStore_guest(StorePMM $request)
    {
        // mapping request data
        $data = $request->all();

        // create person
        $person = new People();
        $person->name = $data['user_name'];
        $person->phone = $data['user_phone'];
        $person->nim = $data['nim'];
        $person->school_origin = $data['prodi_asal'];
        $person->id_user = $data['wali_id'];
        $person->save();

        // create user
        $user = new User();
        $user->name = $data['user_name'];
        $user->email = $data['user_email'];
        $user->occupation = 'Mahasiswa';
        $user->people_id = $person->id;
        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->save();

        $data['user_id'] = $user->id;
        $data['status'] = 'Di Ajukan';
        $data['period'] = date ('Y');
        $data['route']='PMM';

        // create prospect
        $prospect = new Prospect();
        $prospect->name = $data['name'];
        $prospect->phone = $data['phone'];
        $prospect->email = $data['email'];
        $prospect->school = $data['school'];
        $prospect->address = $data['address'];
        $prospect->city = $data['city'];
        $prospect->route = $data['route'];
        $prospect->owner = $data['user_id'];
        $prospect->save();

        $data['prospect_id'] = $prospect->id;

        // create transaction
        $transaction = Transaction::create($data);
        //  $this->getSnapRedirect($transaction);

        return redirect(route('transaction.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($transId)
    {
        // $transaction = Transaction:: findorFail($transId);
        $trans = Transaction::with('Prospect')->Where('id', $transId)->get();
        // return $transaction->first();
        return view('admin/update_prospect',[
            'trans' => $trans->first(),
        ]);

        // return $trans;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($transId, Request $request, Transaction $transaction)
    {
        // mapping request data
        $data = $request->all();

        $prospect = Prospect:: findorFail($transId);
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
        $prospect->save();

        // Send Email to User
        // Mail::to($checkout->User->email)->send(new Paid($checkout));

        $request->session()->flash('success', "Prospect with ID {$prospect->id} has been updated");
        return redirect(route('admin.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($prospect_id, Transaction $transaction)
    {

        $getTransaction = Transaction::where('prospect_id', $prospect_id)->get();
        $prospect = Prospect:: find($prospect_id);
        $tranId = $getTransaction[0]['id'];
        $transaction = Transaction:: find($tranId);


        // return $transaction;
        $prospect->delete();
        $transaction->delete();

    	return redirect('/admin/dashboard');
    }

    public function success()
    {
        return view('transaction.success');
    }
}
