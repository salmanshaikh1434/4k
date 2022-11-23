<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminAuth extends BaseController
{
     function __construct()
    {
        if(session()->get('type') == 'user')
        {
            echo "Logout User Account First then try to login";
            exit();
        }
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
