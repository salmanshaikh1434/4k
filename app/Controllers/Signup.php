<?php

namespace App\Controllers;

use App\Models\SiteInfo;
use App\Models\Social;
use App\Controllers\BaseController;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\Temprary;
use App\Models\User;

require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;


class Signup extends BaseController
{
    public function info($id = Null)
    {
        $page['footer'] = false;
        $social = new Social();
        $m = new Membership();
        $temp = new Temprary();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['membership'] = $m->find($id);

        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $post['pass'] = md5($post['pass']);
            $post['confpass'] = md5($post['confpass']);
            $price_id =  $post['price_id'];
            if ($post['pass'] == $post['confpass']) {
                if ($temp->insert($post)) {
                    $tempid = $temp->insertID();
                    unset($post['pass']);
                    unset($post['confpass']);
                    unset($post["created_at"]);
                    unset($post["updated_at"]);
                    unset($post["deleted_at"]);
                    session()->set($post);

                    return redirect()->to('/signup/checkout/' . $tempid . '/' . $price_id);
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

    public function checkout($tempid = Null, $price_id = NUll)
    {

        $membership = new Membership();
        $membership = $membership->find($price_id);
        $amount = $membership['priceing'];

        $page['membership_id']  = $membership['id'];
        $page['amount'] = $membership['priceing'];
        $page['customer_id'] = $tempid;
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
        $temp = new Temprary();
        $user = new User();


        if ($_POST['razorpay_payment_id']) {
            $info = $temp->find($id);
            unset($info['id']);
            if ($user->insert($info)) {
                $id = $user->insertID();
            }
        }

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



        if (isset($active)) {
            $user['expiry_date'] = $active['expiry_date'];
        }
        return redirect()->to('/login');
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
