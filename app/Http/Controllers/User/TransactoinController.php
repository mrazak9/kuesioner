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
    public function createPpg()
    {
        // return $user;
        return view('transaction/ppg');
    }
    public function createPpa()
    {
        // return $user;
        return view('transaction/ppa');
    }
    public function createPmm()
    {
        // return $user;
        return view('transaction/pmm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ppgStore(Request $request)
    {
         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
         $data['status'] = 'Di Ajukan';
         $data['period'] = date ('Y');
         
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

    public function ppaStore(Request $request)
    {
         // mapping request data
        $data = $request->all();       

        if (!Auth::id()) {
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
            $user->save();

            $data['user_id'] = $user->id;
            $data['status'] = 'Di Ajukan';
            $data['period'] = date ('Y');
            
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
        }else{
            $data['user_id'] = Auth::id();
            $data['status'] = 'Di Ajukan';
            $data['period'] = date ('Y');
            
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
        
    }

    public function pmmStore(Request $request)
    {
         // mapping request data
         $data = $request->all();
         $data['user_id'] = Auth::id();
         $data['status'] = 'Di Ajukan';
         $data['period'] = date ('Y');
         
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
