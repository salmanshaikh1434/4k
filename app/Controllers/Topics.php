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
        $social = new Social();
        $site_info = new SiteInfo();
        $category = new Category();
        $videos = new Video();
        $page['categories'] = $category->findAll();
        $page['categories_id'] = $page['categories'][0]['id'];
        $page['videos'] = $videos->where('show-v',1)->findAll();
      
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/topics', $page);
        return view("frontend/topics", $data);
    }
    public function videos($id = Null)
    {
        $social = new Social();
        $site_info = new SiteInfo();
        $category = new Category();
        $videos = new Video();
        $page['categories'] = $category->findAll();
        $page['videos'] = $videos->select('type')->findAll();
        $page['categories_id'] = $page['categories'][0]['id'];
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/topics', $page);
        return view("frontend/topics", $data);
    }

    public function myvideos($id = null)
    {
        $category = new Category();
        $videos = new Video();
        // $videos->orderBy('sort','ASC');
        $videos = $videos->where('categories', $id)->where('show-v',1)->orderBy('sort','ASC')->findAll();
        $cat_name = $category->where('id', $id)->first();
        echo '
        <div class="title-heading-w3 text-center mx-auto mb-1">';
        if (isset($cat_name)) {
            echo '  <li class="m-3">
                <div class="">
                    <div style="display:flex;justify-content: space-between;align-items:center;color:#242952"> <span style="background-image:url(' . '/assets/images/start1.png' . ');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;position: relative;">
                            <p class="circle2" style="margin-top:-11px;margin-left: -10px;">';
            echo $id;
            echo '</p>
                        </span><span style="margin-bottom: 11px;text-align:center;font-weight:bold">
                            <span style="margin-bottom: 11px;width: 34%;font-size:25px">';
            echo  $cat_name['cat_name'];
            echo '</span>
                        </span>
                        <span style="background-image:url(' . '/assets/images/end.png' . ');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;margin-bottom: 17px;margin-right:-16px;height: 66px;"></span>
                    </div>
                </div>
            </li>
            <div style="border:0.5px solid #f1f1f1;margin-top: -99px;margin-left: 6px;border-radius: 5px;height: 57px;margin-right: 34px;background: white;"></div>';
        }
        echo '</div>
    <br />
    <div class="col-lg-12 form-w3ls" style="overflow-y:auto; height:73vh;">
        <div class="row">';
        foreach ($videos as $video) {
            echo '  <div class="col-md-12 col-lg-6 mb-2">
                    <div class="m-1 shadow p-2" style="min-height: 240px;background-color: white;border-radius: 10px;">';
            if ($video['categories'] == 1 || !null == session()->get('expiry_date')) {
                echo '  <div data-toggle="modal" data-id="' . $video['video_code'] . '" title="Add this item" class="open-AddBookDialog" href="#myLargeModalLabel" video_type="' . $video["type"] . '">

                                <img src="' . $video['photo'] . '" alt="" class="img-fluid radius-image" style="height: 190px;width:100%;">
                            
                            <h4 style="text-align: center;"><a href="#" style="font-size: 16px;overflow:hidden;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient:vertical; video_type="' . $video["type"] . '"">
                                    <span style="font-size: 16px;">'.$video['titel'] . '</span>
                                </a></h4></div>';
            } else {
                echo '<a data-toggle="modal" data-target="#exampleModalCenter" style="filter:blur(16px);" data-idvideo="' . $video['video_code'] . '">
                                <img src="' . $video['photo'] . '" alt="" class="img-fluid radius-image" style="height: 190px;width:100%;">
                            </a>
                            ';
            }
            if ($video['categories'] != 1 && null == session()->get('expiry_date')) {
                echo ' <a class="btn btn-style" style="width:100%" data-toggle="modal" data-target="#exampleModalCenter">Buy Membership</a>';
            }
            echo ' </div></div>';
        }
        echo '</div>
       
    </div>
</div>  ';
    }

    public function mobile_videos($id = Null)
    {
        $social = new Social();
        $site_info = new SiteInfo();
        $category = new Category();
        $videos = new Video();
        $page['footer'] = false;
        $page['category'] = $category->where('id', $id)->first();
        $page['categories'] = $category->findAll();
        $page['videos'] = $videos->where('categories', $id)->where('show-v',1)->orderBy('sort','ASC')->findAll();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        return view('frontend/topics_mobile', $page);
    }
}
