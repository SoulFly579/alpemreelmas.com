<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    public function createForGoogle($userFromGoogle)
    {
        $user = new User();
        $user->username = $userFromGoogle->name;
        $user->email = $userFromGoogle->email;
        $user->password =  Hash::make(Str::random(12));;
        $user->is_admin = false;
        $user->save();
        return $user;
    }

    public function findByEmail($email)
    {
        return User::where("email",$email)->first();
    }

    public function create($request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);;
        $user->is_admin = false;
        $user->save();
        return $user;
    }

}
