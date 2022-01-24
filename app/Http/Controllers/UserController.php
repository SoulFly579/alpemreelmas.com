<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function login()
    {
        return view("auth.login");
    }
    public function loginWithEmail(UserRequest $request)
    {
        if($this->service->isUser($request)){
            return $this->service->redirectDashboard();
        }else{
            return redirect()->back()->withErrors("Invalid email/password.");
        }
    }

    public function loginWithGoogle()
    {
        return Socialite::driver("google")->redirect();
    }

    public function loginWithGoogleCallback()
    {
        $user = Socialite::driver("google")->user();
        if($user){
            return $this->service->saveOrCreateUserForGoogle($user);
        }

        return abort(500);
    }

    public function logout(){
        // TODO look at it because of SOLID prenciple

        Auth::logout();
        return redirect("/login");
    }
}
