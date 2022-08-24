<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\AdminAuth;

class Dashboard extends AdminAuth
{
    public function index()
    {
        $user=new User();
        $page['users']=$user->countAllResults();
        $page['payment']=$user->countAllResults();
        $data['page'] = view('backend/dashboard',$page);
        return view("backend/template", $data);
    }
   
}
