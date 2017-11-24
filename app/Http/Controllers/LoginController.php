<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use EasyWeChat\Foundation\Application;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $app, $request, $login;

    public function __construct(Request $request, LoginService $login)
    {
        $this->app = new Application(config('wechat'));
        $this->request = $request;
        $this->login = $login;
    }

    /**
     * 从微信获取用户信息
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function oauth()
    {
        $response = $this->app->oauth
            ->scopes(['snsapi_userinfo'])
            ->redirect(route('login'));

        return $response;
    }

    /**
     * 本地登录/注册
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login()
    {
        $oauth = $this->app->oauth->user();

        $this->login->login($oauth);

        return redirect()->route('index');
    }

    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->request->session()->forget('user');

        return redirect()->route('index');
    }
}