<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;

class Topics extends AdminAuth
{
    public function index()
    {
        $data['page'] = view('backend/topics/list');
        return view("backend/template", $data);
    }
    public function add()
    {
        $data['page'] = view('backend/topics/add');
        return view("backend/template", $data);
    }
}
