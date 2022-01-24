<?php

namespace App\Http\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService{

    public function isUser(UserRequest $request)
    {
        return Auth::attempt(["email"=>$request->email,"password"=>$request->password]);
    }

    public function redirectDashboard()
    {
        //TODO burayı solid'e uygun mu ona bak.
        if(Auth::user()->is_admin){
            return redirect("/admin/dashboard");
        }else{
            return redirect("/");
        }
    }

    public function saveOrCreateUserForGoogle($userFromGoogle)
    {
        // TODO UserRepostory ile yap.
        $user = User::where("email",$userFromGoogle->email)->first();
        if(!$user){
            $user = new User();
            $user->username = $userFromGoogle->name;
            $user->email = $userFromGoogle->email;
            $user->password = Hash::make(Str::random(12));
            $user->is_admin = false;
            $user->save();
        }

        Auth::login($user,false);

        return $this->redirectDashboard();
    }
}
