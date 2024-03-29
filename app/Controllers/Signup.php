<?php

namespace App\Controllers;

use App\Models\User;
use Razorpay\Api\Api;
use App\Models\Device;
use App\Models\Social;
use App\Models\SiteInfo;
use App\Models\Temprary;
use App\Models\CouponCode;
use App\Models\Membership;
use App\Models\Subscription;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require APPPATH . 'views/razorpay/Razorpay.php';

use PHPMailer\PHPMailer\PHPMailer;
use App\Controllers\BaseController;


class Signup extends BaseController
{
    public function info($id = Null)
    {
        helper('alert_helper');
        $page['footer'] = false;
        $social = new Social();
        $m = new Membership();
        $temp = new Temprary();
        $user = new User();
        $site_info = new SiteInfo();

        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['membership'] = $m->find($id);

        if ($this->request->getMethod() == "post") {
            $post = $this->request->getPost();
            $email = $user->select('email')->where('email', $post['email'])->findAll();
            if (!empty($email)) {
                return redirect()->to('/signup/info/' . $post['price_id'])->with('message', 'email already exist');
            }
            $post['pass'] = md5($post['pass']);
            $post['password'] = $post['pass'];
            $post['confpass'] = md5($post['confpass']);
            $price_id =  $post['price_id'];


            $code = new CouponCode();
            $couponcode = $code->where('name', $post['coupon'])->first();
            // for coupon code



            if (!empty($post['coupon']) && isset($couponcode)) {
                $coupon_id = $couponcode['id'];
                if ($post['coupon'] == $couponcode['name']) {
                    unset($post['password']);
                    $user_id = $user->insert($post);
                    $code->delete($coupon_id);
                    $data['subscription_date'] = date('Y-m-d');
                    $data['user_id'] = $user_id;
                    $data['plan_id'] = $price_id;
                    $membership = new Membership();
                    $members = $membership->find($price_id);
                    $days  = '+' . $members['year'] . ' days';
                    $data['price'] = $members['priceing'];
                    $data['expiry_date'] = date('Y-m-d', strtotime($days));
                    $subscription = new Subscription();
                    $subscription->insert($data);

                    $user->select(['email', 'firstname']);
                    $data =  $user->first();
                    $name = $data['firstname'];
                    $username = $data['email'];
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.hostinger.com';                   //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'noreply@english4000hours.com';        //SMTP username
                        $mail->Password   = 'Etz5Tf4Ux8L@';                         //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('noreply@english4000hours.com', '4k English');
                        $mail->addAddress($username, $name);     //Add a recipient


                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Welcome Mr. ' . $name . '';
                        $mail->Body    = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $post['pass'] . '<br>LOGIN LINK Will APPEAR ON OUR WEBSITE SOON !!! https://mahafencing.in !!!';
                        $mail->AltBody = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $post['pass'] . '';
                        $mail->send();

                        session()->setFlashdata('mailsent', 'Mail have been sent successfully
                        Check your inbox or spam folder!!');
                        return redirect()->to('/login');
                    } catch (Exception $e) {
                        session()->setFlashdata('mailsent', 'Mail Have failed to Sent!');
                        return redirect()->to('/login');
                    }
                }

                // without coupon code
            }

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

        $api = new Api(env('rezor_pay_key_id'), env('rezor_pay_secret'));
        $orderData = [
            'receipt'         => 'rcptid_11',
            'amount'          => $amount * 100, // 39900 rupees in paise
            'currency'        => 'INR'
        ];
        $page['secret'] = env('rezor_pay_secret');
        $page['key_id'] = env('rezor_pay_key_id');
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
            $id = $user->insert($info);
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



        $user->select(['email', 'firstname']);
        $data =  $user->first();
        $name = $data['firstname'];
        $username = $data['email'];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'noreply@english4000hours.com';                     //SMTP username
            $mail->Password   = 'English4000hours@';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('noreply@english4000hours.com', 'English4000hours');
            $mail->addAddress($username, $name);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Welcome Mr. ' . $name . '';
            $mail->Body    = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '<br>LOGIN LINK Will APPEAR ON OUR WEBSITE SOON !!! https://mahafencing.in !!!';
            $mail->AltBody = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '';

            $mail->send();

            session()->setFlashdata('mailsent', 'Mail have been sent successfully
            Check your inbox or spam folder!');
            return redirect()->to('/login');
        } catch (Exception $e) {
            session()->setFlashdata('mailsent', 'Mail Have failed to Sent!');
            return redirect()->to('/login');
        }
    }




    public function forgot_password()
    {
        helper('alert');
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['errors'] = [];
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            if ($post['captcha'] != session()->get('captcha')) {
                $page['errors'][] = 'Wrong Captcha Code entered. please reenter the code';
            } else {
                $change = new User();
                $change->select(['email', 'id', 'firstname']);
                $change->where('email', $post['email']);
                $useremail = $change->first();
                if (!empty($useremail)) {
                    $password = substr(md5(uniqid()), 0, 8);
                    $username = $useremail['email'];
                    $name = $useremail['firstname'];
                    $id = $useremail['id'];
                    $change->update($id, ['pass' => md5($password), 'confpass' => md5($password)]);
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'noreply@english4000hours.com';                     //SMTP username
                        $mail->Password   = 'English4000hours@';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('noreply@english4000hours.com', 'English4000hours');
                        $mail->addAddress($username);     //Add a recipient


                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'New Welcome Mr. ' . $name . '';
                        $mail->Body    = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '<br>LOGIN LINK Will APPEAR ON OUR WEBSITE SOON !!! ' . env("app.baseURL") . '/login !!!';
                        $mail->AltBody = 'Your username and password as follows!<br>USERNAME: ' . $username . '<br>PASSWORD: ' . $password . '';

                        $mail->send();

                        return redirect()->to('/login')->with('message', 'Mail have been sent successfully
                        Check your inbox or spam folder!');
                    } catch (Exception $e) {
                        return redirect()->to('/login')->with('message', 'Mail have failed to Sent!');
                    }
                } else {
                    $page['errors'][] = 'Email does not match';
                }
            }
        }
        $data['page'] = view('/frontend/forgot_password', $page);
        return view("/frontend/template", $data);
    }

    public function signout()
    {
        $device = new Device();
        $uniqid = session()->get('session_id');
        $id = $device->select('id')->where('session_id', $uniqid)->first();

        if ($id)
            $device->delete($id);

        session()->destroy();
        return redirect()->to('/');
    }
}
