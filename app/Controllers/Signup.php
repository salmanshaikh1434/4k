<?php

namespace App\Controllers;
use App\Models\SiteInfo;
use App\Models\Social;

use App\Controllers\BaseController;
use App\Models\User;

class Signup extends BaseController
{
    public function index()
    {
        $social=new Social();
        $site_info=new SiteInfo();
        $page['site_info']=$site_info->first();
        $page['social']=$social->first();
        $user=new User();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $post['pass']= md5($post['pass']);
            $post['confpass']= md5($post['confpass']);
            if ($post['pass'] == $post['confpass']){
            if ($user->insert($post)) {
                return redirect()->to('/login')->with('message', 'SignUp successfully');
            } 
            else {
                $page['error_message'] = "Failed to add Vendors Details please try again !";
            }
        }else{
            $page['error_message'] = "password and confirm password doesn't match!";
        }
            
        }


        $data['page'] = view('frontend/signup',$page);
        return view("frontend/template", $data);
    }
}
