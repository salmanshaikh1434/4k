<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminAuth extends BaseController
{
     function __construct()
    {
        if (session()->get('type') != 'admin') {
            header('location:/admin/login');
            exit();
        }
    }
    public function index()
    {
        //
    }
}
