<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Store;
use App\Http\Requests\User\Transactoin\StoreUser as TransactoinStoreUser;
use App\Models\People;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        $user = User::whereEmail($data['email'])->first();
        if (!$user) {
            return redirect(route('notlogin'));
            // Mail::to($user->email)->send(new AfterRegister ($user));
        }
        Auth::login($user, true);

        return redirect(route('home'));
    }

    public function create(Request $request)
    {
        // return $user;
        return view('user/create');
    }

    public function store(Store $request)
    {
        // return  $request->all();
        // mapping request data
        $data = $request->all();      
 
        // create person 
        $person = new People();
        $person->name = $data['name'];
        $person->nim = $data['nim'];
        $person->phone = $data['phone'];
        $person->school_origin = $data['prodi_asal'];
        $person->graduation_year = $data['year'];
        $person->save();

        // create user
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->occupation = $data['occupation'];
        $user->avatar = Auth::user()->avatar;
        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->people_id = $person->id;
        $user->is_admin = false;
        $user->save();

        // create transaction
        //  $user = User::create($data);
        //  $this->getSnapRedirect($transaction);

        return redirect(route('view_user')); 
    }
}
