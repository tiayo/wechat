<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class LoginService
{
    protected $request, $user;

    public function __construct(Request $request, UserRepository $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function login($oauth)
    {
        $user = $this->user->findByOpenid($oauth);

        $this->request->session()->put('user', $user);

        return true;
    }
}
