<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;

class Settings extends AdminAuth
{
    public function index()
    {
        $data['page'] = view('backend/settings/site');
        return view("backend/template", $data);
    }
    public function social()
    {
        $data['page'] = view('backend/settings/social_link');
        return view("backend/template", $data);
    }
    public function my_account()
    {
        $data['page'] = view('backend/settings/my_account');
        return view("backend/template", $data);
    }
}
