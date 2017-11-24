<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;

class PayController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function order()
    {
        $user = $this->request->session()->get('user');

        $attributes = [
            'trade_type'       => 'NATIVE',
            'body'             => '报名费',
            'detail'           => $user['name']."(".$user['id'].")"."报名费",
            'out_trade_no'     => date('YmdHis') . rand(10000000,99999999),
            'total_fee'        => 1, // 单位：分
            'notify_url'       => 'http://xxx.com/order-notify',
//            'openid'           => $user['openid'],
        ];

        $order = new Order($attributes);

        $app = new Application(config('wechat'));

        $payment = $app->payment;

        $result = $payment->prepare($order);
dd($result);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
        }

        $json = $payment->configForPayment($prepayId);

        return view('payment', [
            'json' => $json,
        ]);
    }
}