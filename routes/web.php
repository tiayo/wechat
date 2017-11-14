<?php

$this->group(['middleware' => 'login'], function () {
    $this->get('/', 'IndexController@index')->name('index');

    $this->get('/oauth', 'LoginController@oauth')->name('oauth');
    $this->get('/login', 'LoginController@login')->name('login');

    $this->get('/order', 'PayController@order')->name('order');
});



