<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Profile\UpdatePeopleRequest;
use App\Http\Requests\Dashboard\Profile\UpdateProfileRequest;

use App\Models\People;
use App\Models\Prospect;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('People')->orderBy('name', 'desc')->paginate(10);
        // return $users;

        $pmm = Transaction::Where('route', "PMM")->count();
        $ppg = Transaction::Where('route', "PPG")->count();
        $ppa = Transaction::Where('route', "PPA")->count();
        $partisipantppg = Transaction::Where('route', "PPG")->groupBy('user_id')->count();
        $partisipantppa = Transaction::Where('route', "ppa")->groupBy('user_id')->count();
        $partisipantpmm = Transaction::Where('route', "pmm")->groupBy('user_id')->count();
        $prospects = Transaction::Where('status', "Di Ajukan")->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        return view('pages.dashboard.user.index', compact('users', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
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
        $prospects = Transaction::Where('status', "Di Ajukan")->count();
        $progress = Prospect::whereNotNull('id_registrant')->count();

        $user = User::where('id', $id)->first();
        return view('pages.dashboard.profile', compact('user', 'pmm', 'ppg', 'ppa', 'prospects', 'partisipantppa', 'partisipantppg', 'partisipantpmm', 'progress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($userId, Request $request)
    {
        // mapping request data
        $data = $request->all();

        $user = User:: findorFail($userId);
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->email = $data['email'];
        $user->save();

        $people = People::Where('id_user', $userId)->first();
        $people->name = $data['name'];
        $people->phone = $data['phone'];
        $people->school_origin = $data['school_origin'];
        $people->graduation_year = $data['graduation_year'];
        $people->save();

        // Send Email to User
        // Mail::to($checkout->User->email)->send(new Paid($checkout));

        $request->session()->flash('success', "Prospect with ID {$user->id} has been updated");
        return redirect(route('admin.dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request_profile, UpdatePeopleRequest $request_detail_user)
    {
        $data_profile = $request_profile->all();
        $data_detail_user = $request_detail_user->all();

        return $data_profile;

        // Prosess save to user
        $user = User::find(Auth::user()->id);
        $user->update($data_profile);

        // Proses save to detail user
        $detail_user = People::find($user->people_id);
        $detail_user->update($data_detail_user);

        // Prosess save to experience user

        toast()->success('Upadte has been success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
