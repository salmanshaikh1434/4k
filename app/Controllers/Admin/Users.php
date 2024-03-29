<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;
use App\Models\Device;
use App\Models\Temprary;
use App\Models\User;

class Users extends AdminAuth
{
    public function index()
    {
        helper('alert_helper');
        $user = new User();
        $user->select('usres.*,s.price,s.subscription_date,s.expiry_date,p.titel');
        $user->join('subscription as s', 's.user_id = usres.id', 'left');
        $user->join('price as p', 'p.id = s.plan_id', 'left');
        $page['users'] = $user->orderby('id','desc')->findAll();
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

    public function temp_users()
    {
        helper('alert_helper');
        $user = new Temprary();
        $user->select('temprary.*,s.price,s.subscription_date,s.expiry_date,p.titel');
        $user->join('subscription as s', 's.user_id = temprary.id', 'left');
        $user->join('price as p', 'p.id = s.plan_id', 'left');
        $page['users'] = $user->findAll();
        $data['page'] = view('backend/temp_user_list', $page);
        return view("backend/template", $data);
    }

    public function temp_delete($id)
    {
        $massage = "Failed to Delete";
        $user = new Temprary();
        if ($user->delete($id)) {
            $massage = 'User Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }

    public function active_user()
    {
        helper('alert');
        $devicesModel = new Device();
        $page['users'] = $devicesModel->findAll();
        $data['page'] = view('backend/user_connected', $page);
        return view("backend/template", $data);
    }

    public function delete_session($id)
    {
        $massage = "Failed to Delete";
        $devicesModel = new Device();
        if ($devicesModel->delete($id)) {
            $massage = 'User session Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }
}
