<?php

namespace App\Controllers\Admin;

use App\Models\Membership;
use App\Controllers\BaseController;
use App\Models\CouponCode;

class CouponCodes extends BaseController
{
    public function index()
    {
        $couponcode=new CouponCode();
        $membership= new Membership();
        $couponcode->select('p.titel as plan,coupon_code.id,coupon_code.name');
        $couponcode->join('price as p','p.id=coupon_code.subscription_id','left');
        $page['coupons']=$couponcode->findAll();
        $data['page'] = view('backend/coupon/list', $page);
        return view("backend/template", $data);
    }

    public function add()
    {
        $membership= new Membership();
        $coupon=new CouponCode();
        $page['memberships']=$membership->findAll();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            if ($coupon->insert($post)) {
                return redirect()->to('/admin/couponcodes/')->with('message', 'Coupon Added successfully');
            } else {
                $page['error_message'] = "Failed to add Coupon please try again !";
            }

        }
        $data['page'] = view('backend/coupon/add',$page);
        return view("backend/template", $data);
    }

    public function delete($id)
    {
        $massage = "Failed to Delete";
        $coupon=new CouponCode();
        if ($coupon->delete($id)) {
            $massage = 'Couponcode Deleted Successfully';
        }
        return redirect()->to('/admin/couponcodes/')->with('message', $massage);
    }
}
