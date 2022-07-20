<?php

namespace App\Controllers;
use App\Models\SiteInfo;
use App\Models\Social;
use App\Controllers\BaseController;

class Membership extends BaseController
{
    public function index()
    {
        $site_info=new SiteInfo();
        $social=new Social();
        $page['social']=$social->first();
        $page['site_info']=$site_info->first();
        $data['page'] = view('frontend/membership',$page);
        return view("frontend/template", $data);
    }
}
