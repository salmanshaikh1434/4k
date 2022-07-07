<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SiteInfo;
use App\Models\Social;

class Home extends BaseController
{
    public function index()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $category=new Category();
        $page['categories']=$category->findAll();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/index', $page);
        return view("frontend/template", $data);
       
    }
    public function privacy_policy()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/privacy_policy',$page);
        return view("frontend/template", $data);
       
    }
    public function terms_condition()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/terms_and_condition',$page);
        return view("frontend/template", $data);
       
    }
    public function refund()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/refund',$page);
        return view("frontend/template", $data);
       
    }
    public function notes()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/notes',$page);
        return view("frontend/template", $data);
       
    }
}
