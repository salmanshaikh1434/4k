<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteInfo;

class Login extends BaseController
{
    public function index()
    {
        if (NULL !== session()->get('is_loggedin') && session()->get('is_loggedin') == true) {
            return redirect()->to('/admin/dashboard');
        }
        return view('backend/login');
    }
    public function login_check()
    {
        $login = new SiteInfo();
        $post = $this->request->getPost();
        $user = $login->where('email', $post['email'])->first();
        if (!empty($user)) {
            if ($user['code'] == md5($post['password'])) {

                // remove unnesessory array parameters
                unset($user['password']);
                unset($user["created_at"]);
                unset($user["updated_at"]);
                unset($user["deleted_at"]);

                // add login success msg to session 
                session()->set('is_loggedin', true);
                // set user data as session 
                session()->set($user);
                    return redirect()->to('/admin/dashboard');
            } else {
                session()->setFlashdata('message', 'Check Your password and try again');
                return redirect()->to('/admin/login');
            }
        } else {
            session()->setFlashdata('message', 'User not Found');
            return redirect()->to('/admin/login');
        }
    }
}
