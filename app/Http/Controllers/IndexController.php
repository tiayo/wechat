<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;

class IndexController extends Controller
{
    protected $app;

    public function __construct()
    {
        $this->app = new Application(config('wechat.'));
    }

    public function index()
    {
        dd($this->app->user);
    }
}