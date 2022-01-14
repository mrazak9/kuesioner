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
use App\Http\Requests\User\Transactoin\store;
use App\Http\Requests\User\Transactoin\StorePPA;

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
            return redirect(route('dashboard'));
        }
        return view('transaction/ppg');
    }
    public function createPpa(Request $request)
    {
        // return $user;
        $transactions = Transaction::with('Prospect')->Where('user_id',Auth::id())->get();
        $count= $transactions->count();
        if ($count == 10) {
            $request->session()->flash('error',"Tidak dapat menambah data, karena Anda Telah memiliki data lebih dari 10");
            return redirect(route('dashboard'));
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
            return redirect(route('dashboard'));
        }
        return view('transaction/pmm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ppgStore(Store $request)
    {
        return $request->all();
         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
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
         $prospect->route = 'PPG';
         $prospect->owner = $data['user_id'];
         $prospect->save();

         $data['prospect_id'] = $prospect->id;
         
         // create checkout
         $checkout = Transaction::create($data);
        //  $this->getSnapRedirect($checkout);

         return redirect(route('transaction.success'));
    }

    public function ppaStore(StorePPA $request)
    {
        return  $request->all();

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
        $user->avatar = Auth::user()->avatar;
        $user->people_id = $person->id;
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
        $prospect->route = 'PPG';
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
        return  $request->all();

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
        return $request->all();

         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
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
         $prospect->route = 'PPG';
         $prospect->owner = $data['user_id'];
         $prospect->save();

         $data['prospect_id'] = $prospect->id;
         
         // create checkout
         $checkout = Transaction::create($data);
        //  $this->getSnapRedirect($checkout);

         return redirect(route('transaction.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
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
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function success()
    {
        return view('transaction.success');
    }
}
