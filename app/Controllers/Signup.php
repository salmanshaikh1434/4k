<?php

namespace App\Controllers;

use App\Models\User;
use Razorpay\Api\Api;
use App\Models\Device;
use App\Models\Social;
use App\Models\SiteInfo;
use App\Models\Temprary;
use App\Models\Membership;
use App\Models\Subscription;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'views/razorpay/Razorpay.php';

use PHPMailer\PHPMailer\PHPMailer;
use App\Controllers\BaseController;


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
            $post['password'] = $post['pass'];
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
            $password = $info['password'];
            unset($info['password']);
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



        $user->select(['email',  'firstname']);
        $data =  $user->first();
        $name = $data['firstname'];
        $username = $data['email'];
        $password = $password;
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'salman@sublimetechnologies.in';                     //SMTP username
            $mail->Password   = 'Etz5Tf4Ux8L@';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('salman@sublimetechnologies.in', '4k English');
            $mail->addAddress($username, $name);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome Mr. ' . $name . '';
            $mail->Body    = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '<br>LOGIN LINK Will APPEAR ON OUR WEBSITE SOON !!! https://mahafencing.in !!!';
            $mail->AltBody = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '';

            $mail->send();

            session()->setFlashdata('mailsent', 'Mail Have Sent Sucessfully!');
            return redirect()->to('/login');
        } catch (Exception $e) {
            session()->setFlashdata('mailsent', 'Mail Have failed to Sent!');
            return redirect()->to('/login');
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // return redirect()->to('/login');
    }


    // public function send_password($id = null, $password = null)
    // {
    //     $user = new User();
    //     if ($id != null) {
    //         $user->where('id', $id);
    //     }
    //     $user->select(['email','firstname']);
    //     $data =  $user->first();
    //     $name = $data['firstname'];
    //     $username = $data['email'];
    //     $password = $password;
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'salman@sublimetechnologies.in';                     //SMTP username
    //         $mail->Password   = 'Salman@123';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('salman@sublimetechnologies.in', 'Maharashtra Fencing Association');
    //         $mail->addAddress($username, $name);     //Add a recipient


    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Welcome Mr. ' . $name . '';
    //         $mail->Body    = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '<br>LOGIN LINK Will APPEAR ON OUR WEBSITE SOON !!! https://mahafencing.in !!!';
    //         $mail->AltBody = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '';

    //         $mail->send();

    //         session()->setFlashdata('mailsent', 'Mail Have Sent Sucessfully!');
    //         return redirect()->to('/login');
    //     } catch (Exception $e) {
    //         session()->setFlashdata('mailsent', 'Mail Have failed to Sent!');
    //         return redirect()->to('/login');
    //         // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }

    // }

    public function forgot_password()
    {
        helper('alert_helper');
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['errors'] = [];
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            $change = new User();
            $change->select(['email', 'id', 'firstname']);
            $change->where('email', $post['email']);
            $useremail = $change->first();


    public function signout()
    {
        $device = new Device();
        $uniqid = session()->get('session_id');      
        $id=$device->select('id')->where('session_id', $uniqid)->first();
        $device->delete($id);
        session()->destroy();
        return redirect()->to('/');
    }
}
