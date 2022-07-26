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
        $page['categories_id']=$page['categories'][0]['id'];
        $page['videos']=$videos->findAll();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/topics', $page);
        return view("frontend/topics", $data);
    }
    public function videos($id=Null)
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $category=new Category();
        $videos=new Video();
        $page['categories']=$category->findAll();  
        $page['categories_id']=$page['categories'][0]['id'];
        $page['videos']=$videos->where('categories',$id)->findAll();
        $page['cat_name']=$category->where('id',$id)->first();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/topics', $page);
        return view("frontend/topics", $data);
    }

    public function mobile_videos($id=Null)
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $category=new Category();
        $videos=new Video();
        $page['categories']=$category->findAll();  
        $page['pager']=$category->pager;
        $page['videos']=$videos->where('categories',$id)->findAll();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $data['page'] = view('frontend/topics_mobile', $page);
        return view("frontend/topics", $data);
    }
    
    
}
