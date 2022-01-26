<?php

namespace App\Http\Services;

use App\Http\Repositories\Classes\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserService extends Service {

    public UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

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
        if(!($user = $this->userRepository->findByEmail($userFromGoogle->email))){
            $user = $this->userRepository->createForGoogle($userFromGoogle);
        }
        Auth::login($user,false);
        return $this->redirectDashboard();
    }

    public function createUserWithRegister($request)
    {
        $this->userRepository->create($request);
    }


}
