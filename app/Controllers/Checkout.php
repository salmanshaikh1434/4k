<?php

namespace App\Controllers;

use App\Controllers\BaseController;

require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;
use App\Models\User;

class Checkout extends BaseController
{
    public function __construct()
    {
        $this->session     = \Config\Services::session();
    }
    public function index()
    { 
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
       return  view('frontend/checkout', $page);
    }
    public function payment_status($id)
    { 
        print_r($_POST);
        exit();
        $post['payed']=1;
        $post['date']=date('d-m-Y');
        $user = new User();
        $page['videos'] = $user->update($id,$post);
    }
}
