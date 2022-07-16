<?php

namespace App\Controllers;

use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\User;


use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        if ($this->request->getMethod() == 'post') {
            $user = new User();
            $post = $this->request->getPost();
            $user = $user->where('email', $post['email'])->first();
            if (!empty($user)) {
                if ($user['pass'] == md5(md5($post['password']) . 'nicebank1000')) {
                    // remove unnesessory array parameters
                    unset($user['password']);
                    session()->set('is_loggedin', true);
                    session()->set($user);
                    return redirect()->to('/topics');
                }
            }
        }

        $data['page'] =view('frontend/sign_in', $page);
        return view("frontend/sign_in", $data);
    }
}
