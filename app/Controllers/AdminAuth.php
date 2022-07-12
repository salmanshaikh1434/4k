<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminAuth extends BaseController
{
    public function __construct()
    {
        $session = session()->get();
        if (!isset($session['is_loggedin']) || !$session['is_loggedin']) {
            header('location:/admin/login');
            exit();
        }
    }
    public function index()
    {
        exit();
    }
}
