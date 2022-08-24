<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class Users extends BaseController
{
    public function index()
    {
        helper('alert_helper');
        $user = new User();
        $user->select('usres.*,s.*,p.titel');
        $user->join('subscription as s', 's.user_id = usres.id', 'left');
        $user->join('price as p', 'p.id = s.plan_id', 'left');
        $page['users'] = $user->findAll();
        $data['page'] = view('backend/user_list', $page);
        return view("backend/template", $data);
    }
    public function delete($id)
    {
        $massage = "Failed to Delete";
        $user = new User();
        if ($user->delete($id)) {
            $massage = 'User Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }
}
