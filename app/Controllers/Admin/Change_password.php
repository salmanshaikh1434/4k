<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;
use App\Models\SiteInfo;

class Change_password extends AdminAuth
{
    public function index()
    {
        $page['errors'] = [];
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            $login = new SiteInfo();
            if (strlen($post['new_password']) >= 5) {
                if ($post['new_password'] == $post['confirm_password']) {
                    $user = $login->select('code')->find(session()->get('id'));
                    if (md5($post['old_password']) == $user['code']) {
                        if (
                            $login->update(session()->get('id'), ['code' => md5($post['new_password'])])
                        ) {
                            session()->setFlashdata('msg', 'Password changed Successfully');
                            return redirect()->to('/admin/dashboard');
                        }
                    } else {
                        $page['errors'][] = 'Old Password Not Match';
                    }
                } else {
                    $page['errors'][] = ' New And Confirm Password should be same';
                }
            } else {
                $page['errors'][] =  "Password Must Be More than 5 character";
            }
        }
        $data['page'] = view('/backend/change_password', $page);
        return view("/backend/template", $data);
    }
}
