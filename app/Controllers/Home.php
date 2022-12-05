<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Membership;
use App\Models\SiteInfo;
use App\Models\Social;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class Home extends BaseController
{
    public function index()
    {
        helper('alert');
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $category = new Category();
        $membership = new Membership();
        $page['categories'] = $category->findAll();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $page['memberships'] = $membership->findAll();
        $data['page'] = view('frontend/index', $page);
        return view("frontend/template", $data);
    }
    public function privacy_policy()
    {
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/privacy_policy', $page);
        return view("frontend/template", $data);
    }
    public function terms_condition()
    {
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/terms_and_condition', $page);
        return view("frontend/template", $data);
    }
    public function refund()
    {
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/refund', $page);
        return view("frontend/template", $data);
    }
    public function notes()
    {
        $page['footer'] = true;
        $social = new Social();
        $site_info = new SiteInfo();
        $page['site_info'] = $site_info->first();
        $page['social'] = $social->first();
        $data['page'] = view('frontend/notes', $page);
        return view("frontend/template", $data);
    }

    public function contact_us()
    {

        $post = $this->request->getPost();

        if ($post['captcha'] != session()->get('captcha')) {
            session()->setFlashdata('message', 'Wrong Captcha Code entered. please reenter the code');
            return redirect()->to('/#contact');
        }

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
            $mail->Port       = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('noreply@english4000hours.com', 'English4000hours');
            $mail->addAddress('info@english4000hours.com');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $post['subject'];
            $mail->Body    = 'Name:  ' . $post['name'] . '<br/>' . 'Email:  ' . $post['email'] . '<br/>' . '    ' . $post['message'];
            $mail->AltBody = '';

            $mail->send();

            session()->setFlashdata('message', 'Mail Have Sent Successfully!');
            return redirect()->to('/#contact');
        } catch (Exception $e) {
            session()->setFlashdata('message', 'Mail Have failed to Sent!');
            return redirect()->to('/#contact');
        }
    }

    public function get_captcha()
    {
        $random_num    = md5(random_bytes(64));
        $captcha_code  = substr($random_num, 0, 6);
        // Assign captcha in session
        session()->set(['captcha' => $captcha_code]);
        // Create captcha image
        $layer = imagecreatetruecolor(168, 37);
        $captcha_bg = imagecolorallocate($layer, 247, 174, 71);
        imagefill($layer, 0, 0, $captcha_bg);
        $captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
        imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
        header("Content-type: image/jpeg");
        imagejpeg($layer);
        // Free memory
        imagedestroy($layer);
        exit();
    }
}
