<?php

//登录授权
$this->get('/oauth', 'LoginController@oauth')->name('oauth');
$this->get('/login', 'LoginController@login')->name('login');

//重新登录
$this->get('/logout', 'LoginController@logout')->name('logout');

//登陆后操作
$this->group(['middleware' => 'oauth'], function () {
    $this->get('/', 'IndexController@index')->name('index');
    $this->get('/order', 'PayController@order')->name('order');
});



