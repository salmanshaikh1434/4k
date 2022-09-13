<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Social;
use App\Models\SiteInfo;
use App\Controllers\BaseController;

class Change_password extends BaseController
{
    public function index()
    {
        helper('alert_helper');
        $page['footer']=true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['errors'] = [];
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            $login = new User();
            if (strlen($post['new_password']) >= 5) {
                if ($post['new_password'] == $post['confirm_password']) {
                    $user = $login->select('pass')->find(session()->get('id'));
                    if (md5($post['old_password']) == $user['pass']) {
                        if (
                            $login->update(session()->get('id'), ['pass' => md5($post['new_password']),'confpass' => md5($post['new_password']),])
                        ) {
                            return redirect()->to('/change_password')->with('message', 'Password changed Successfully');
        
                        }
                    } else {
                        $page['errors'][] = "Old Password Doesn't Match";
                    }
                } else {
                    $page['errors'][] = ' New And Confirm Password should be same';
                }
            } else {
                $page['errors'][] =  "Password Must Be More than 5 character";
            }
        }
        $data['page'] = view('/frontend/change_password', $page);
        return view("/frontend/template", $data);
    }

    
}
