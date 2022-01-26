<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function login()
    {
        return view("auth.login");
    }
    public function loginWithEmail(UserRequest $request)
    {
        if($this->userService->isUser($request)){
            return $this->userService->redirectDashboard();
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
            return $this->userService->saveOrCreateUserForGoogle($user);
        }

        return abort(500);
    }

    public function logout(){
        // TODO look at it because of SOLID prenciple

        Auth::logout();
        return redirect("/login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(UserRegisterRequest $request)
    {
        $this->userService->createUserWithRegister($request);
        return redirect("/login")->with("success","Kaydınız başarılı bir şekilde yapılmıştır.");
    }
}
