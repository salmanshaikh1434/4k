<?php

namespace App\Controllers;

use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\User;
use App\Models\Membership;
use App\Models\Subscription;
use App\Controllers\BaseController;

require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;


class Memberships extends BaseController
{
    public function index()
    {
        $page['footer'] = true;
        $site_info = new SiteInfo();
        $social = new Social();
        $membership = new Membership();
        $page['memberships'] = $membership->findAll();
        $page['social'] = $social->first();
        $page['site_info'] = $site_info->first();
        $data['page'] = view('frontend/membership', $page);
        return view("frontend/template", $data);
    }

    public function checkout($id = Null)
    {

        $membership = new Membership();
        $membership = $membership->find($id);
        $amount = $membership['priceing'];
        $page['membership_id']  = $membership['id'];
        $page['amount'] = $membership['priceing'];
        $page['customer_id'] = session()->get('id');
        $page['customer_name'] = session()->get('firstname');
        $page['name'] = session()->get('firstname');
        $page['email'] = session()->get('email');
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
    public function payment_status($id = null, $membership_id = null)
    {
        $data['payment_id'] = $_POST['razorpay_payment_id'];
        $data['subscription_date'] = date('Y-m-d');
        $data['user_id'] = $id;
        $data['plan_id'] = $membership_id;
        $membership = new Membership();
        $members = $membership->find($membership_id);
        $days  = '+' . $members['year'] . ' days';
        $data['price'] = $members['priceing'];
        $data['expiry_date'] = date('Y-m-d', strtotime($days));
        $subscription = new Subscription();
        $subscription->insert($data);
        $subscription->where('user_id', session()->get('user_id'));
        $subscription->select('expiry_date');
        $active = $subscription->first();
        print_r($active);
        exit();
        if(isset($active)){
            $user['expiry_date'] = $active['expiry_date'];
        }
        return redirect()->to('/topics');
        
    }
}
