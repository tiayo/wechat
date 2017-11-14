<?php

namespace App\Services;

use App\Repositories\UserRepository;

class IndexService
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function login()
    {

    }
}