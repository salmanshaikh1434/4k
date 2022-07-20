<?php

namespace App\Controllers;

use App\Models\SiteInfo;
use App\Models\Social;

use App\Controllers\BaseController;
use App\Models\User;

require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;

class Signup extends BaseController
{
    public function index()
    {
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $user = new User();
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $post['pass'] = md5($post['pass']);
            $post['confpass'] = md5($post['confpass']);
            if ($post['pass'] == $post['confpass']) {
                if ($user->insert($post)) {
                    $page['customer_id'] = $user->getInsertID();
                    $post = $this->request->getPost();
                    $amount = $post['amount'];
                    $page['amount'] = $post['amount'];
                    $page['customer_name'] = $post['firstname'];
                    $page['email'] = $post['email'];
                    $page['contact'] = $post['contact'];
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
                } else {
                    $page['error_message'] = "Failed to add Vendors Details please try again !";
                }
            } else {
                $page['error_message'] = "password and confirm password doesn't match!";
            }
        }


        $data['page'] = view('frontend/signup', $page);
        return view("frontend/template", $data);
    }
}
