<?php

use  Illuminate\Http\Request;

if (!function_exists('USER')) {
    function USER($option)
    {
        return Request::session()->get('user')[$option];
    }
}