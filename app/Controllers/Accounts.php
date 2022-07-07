<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\User;

class Accounts extends BaseController
{
    public function index()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $user=new User();
        $page['users']=$user->first(7);
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/account', $page);
        return view("frontend/template", $data);
    }
}
