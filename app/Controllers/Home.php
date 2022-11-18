<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Membership;
use App\Models\SiteInfo;
use App\Models\Social;

class Home extends BaseController
{
    public function index()
    {
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
        $email = \Config\Services::email();
        $config['protocol'] = 'sendmail';
        $config['mailPath'] = '/usr/sbin/sendmail';
        $config['charset']  = 'iso-8859-1';
        $config['wordWrap'] = true;

        $email->initialize($config);
        

        $email->setFrom('manojshelgaonkarb@gmail.com', 'Manoj Name');
        $email->setTo('manojshelgaonkar111@gmail.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        $email->send();
    }
}
