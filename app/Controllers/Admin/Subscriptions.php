<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminAuth;
use App\Models\Membership;

class Subscriptions extends AdminAuth
{
    public function index()
    {
        helper('alert_helper');
        $membership = new Membership();
        $page['memberships'] = $membership->findAll();
        $data['page'] = view('backend/subscription/list', $page);
        return view("backend/template", $data);
    }
    public function add($id)
    {
        $membership = new Membership();
        $page[] = '';
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            if ($membership->update($id, $post)) {
                return redirect()->to('admin/subscriptions/')->with('message', 'Plan Updated successfully');
            } else {
                $page['error_message'] = "Failed to Update Plan please try again !";
            }
        }
        $page['memberships'] = $membership->find($id);
        $data['page'] = view('backend/subscription/add', $page);
        return view('backend/template', $data);
    }

    public function delete($id)
    {
        $massage = "Failed to Delete Plan";
        $membership = new Membership();
        if ($membership->delete($id)) {
            $massage = 'Plan Deleted Successfully';
        }
        return redirect()->back()->with('message', $massage);
    }
}
