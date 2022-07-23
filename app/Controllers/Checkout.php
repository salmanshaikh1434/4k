<?php

namespace App\Controllers;

use App\Controllers\BaseController;

require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;
use App\Models\User;
use App\Models\Social;
use App\Models\SiteInfo;

class Checkout extends BaseController
{
    public function index()
    {
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            print_r($post);
            exit();
            $key_id = 'rzp_test_t4AiT3u3UUTSi9';
            $secret = 'ElCTJ6v2l9cxv66SRzJn7Ekb';
            $api = new Api($key_id, $secret);
            $orderData = [
                'receipt'         => 'rcptid_11',
                'amount'          => 39900, // 39900 rupees in paise
                'currency'        => 'INR'
            ];
            $page['secret'] = 'ElCTJ6v2l9cxv66SRzJn7Ekb';
            $page['key_id'] = 'rzp_test_t4AiT3u3UUTSi9';
            $page['razorpayOrder'] = $api->order->create($orderData);
        }
        $data['page'] = view('frontend/membership', $page);
        return view("frontend/template", $data);
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
