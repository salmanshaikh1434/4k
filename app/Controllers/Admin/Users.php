<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        $user=new User();
        $page['users']=$user->findAll();
        $data['page'] = view('backend/user_list',$page);
        return view("backend/template", $data);
    }
}
