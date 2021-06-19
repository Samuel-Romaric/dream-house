<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('flash')) {
    function flash($message, $type = '')
    {
        if ($type == 'success') {
            Session::flash('notification.message', $message);
            Session::flash('notification.type', 'text-white bg-green-600');
        } elseif ($type == 'danger') {
            Session::flash('notification.message', $message);
            Session::flash('notification.type', 'text-white bg-red-600');
        } else {
            Session::flash('notification.message', $message);
            Session::flash('notification.type', $type);
        }
        // Session::flash('notification.message', $message);
        // Session::flash('notification.type', $type);
    }
}

if (!function_exists('is_active')) {
    function is_active($route)
    {
        return Route::is($route) ? "text-white bg-blue-600 rounded-lg duration-700 hover:bg-blue-800" : " hover:shadow-lg hover:rounded-lg hover:bg-gray-200 duration-700 hover:text-blue-600";
    }
}
