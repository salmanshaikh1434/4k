<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;

class Dashboard extends AdminAuth
{
    public function index()
    {
        $data['page'] = view('backend/dashboard');
        return view("backend/template", $data);
    }
   
}
