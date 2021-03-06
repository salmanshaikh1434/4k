<?php

namespace App\Controllers;
use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\User;
use App\Models\Membership;
use App\Controllers\BaseController;
require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;


class Memberships extends BaseController
{
    public function index()
    {
        $site_info=new SiteInfo();
        $social=new Social();
        $membership=new Membership();
        $page['memberships']=$membership->findAll();
        $page['social']=$social->first();
        $page['site_info']=$site_info->first();
        $data['page'] = view('frontend/membership',$page);
        return view("frontend/template", $data);
    }
    public function checkout($id=Null)
    {
        
        $membership=new Membership();
        $membership=$membership->find($id);
        $amount = $membership['priceing'];
        $page['amount']=$membership['priceing'];
        $page['customer_id']=session()->get('id');
        $page['customer_name']=session()->get('firstname');
        $page['name']=session()->get('firstname');
        $page['email'] =session()->get('email');
        $page['contact'] = session()->get('contact');
        $key_id = 'rzp_test_t4AiT3u3UUTSi9';
        $secret = 'ElCTJ6v2l9cxv66SRzJn7Ekb';
        $api = new Api($key_id, $secret);
        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => $amount * 100, // 39900 rupees in paise
            'currency'        => 'INR'
        ];
        $page['secret'] = 'ElCTJ6v2l9cxv66SRzJn7Ekb';
        $page['key_id'] = 'rzp_test_t4AiT3u3UUTSi9';
        $page['razorpayOrder'] = $api->order->create($orderData);
        return  view('frontend/checkout', $page);
    }
    public function payment_status($id)
    {
        print_r($_POST);
        exit();
        $post['payed'] = 1;
        $post['date'] = date('d-m-Y');
        $user = new User();
        $page['videos'] = $user->update($id, $post);
    }
}
