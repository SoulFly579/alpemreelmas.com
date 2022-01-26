<?php


namespace App\Http\Repositories\Interfaces;

interface UserInterface
{
    public function createForGoogle($userFromGoogle);
    public function create($request);
    public function findByEmail($email);
}
