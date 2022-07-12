<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\Video;

class Topics extends BaseController
{
    public function index()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $category=new Category();
        $videos=new Video();
        $page['categories']=$category->findAll();  
        $page['video_categories']=$category->paginate(4);
        $page['pager']=$category->pager;

        $page['videos']=$videos->findAll();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/topics', $page);
        return view("frontend/template", $data);
    }
}
