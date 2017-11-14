<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByOpenid($oauth)
    {
       $user = $this->user
            ->where('openid', $oauth->getId())
            ->first();

       //找不到则创建
       if (empty($user)) {
           $user = $this->create($oauth);
       }

       return $user;
    }

    public function create($oauth)
    {
        return $this->user->create([
            'name' => $oauth->getName(),
            'openid' => $oauth->getId(),
        ]);
    }
}