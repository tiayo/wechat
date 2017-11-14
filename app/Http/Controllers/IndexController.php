<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $app, $request, $login;

    public function __construct(Request $request, LoginService $login)
    {
        $this->app = new Application(config('wechat'));
        $this->request = $request;
        $this->login = $login;
    }

    /**
     * 调度方法
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        if ($this->request->session()->has('user')) {
            return response('你好,'.session('user')['name']);
        }

        $response = $this->app->oauth
            ->scopes(['snsapi_userinfo'])
            ->redirect(route('login'));

        return $response;
    }

    /**
     * 登录/注册
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login()
    {
        $oauth = $this->app->oauth->user();

        $this->login->login($oauth);

        return $this->index();
    }
}