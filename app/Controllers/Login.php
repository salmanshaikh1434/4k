<?php

namespace App\Controllers;

use App\Models\SiteInfo;
use App\Models\Social;
use App\Models\User;


use App\Controllers\BaseController;
use App\Models\Device;
use App\Models\Subscription;

class Login extends BaseController
{
  public function index()
  {
    $page['footer']=false;
    helper('alert_helper');
    $social = new Social();
    $devices = new Device();
    $site_info = new SiteInfo();
    $page['site_info'] = $site_info->first();
    $page['social'] = $social->first();
    if ($this->request->getMethod() == 'post') {
      $user = new User();
      $subscription = new Subscription();
      $post = $this->request->getPost();
      $user = $user->where('email', $post['email'])->first();
      $count = $devices->where('email', $post['email'])->countAllResults();
      

      if (!empty($user)) {

        if ($user['pass'] == md5($post['password']) && $user['email']==$post['email']) {
         
          $com = $subscription->select('plan_id')->where('user_id', $user['id'])->first();
          if ($com['plan_id'] == 1) {
            $i = 2;
          }
          if ($com['plan_id'] == 2) {
            $i = 4;
          }
          if ($com['plan_id'] == 3) {
            $i = 7;
          }
          if ($count <= $i) {
           
            // remove unnesessory array parameters
            $subscription->where('user_id', $user['id']);
            $subscription->select('expiry_date,plan_id');
            $active = $subscription->first();
            if (isset($active)) {
              $user['expiry_date'] = $active['expiry_date'];
            }
            unset($user['pass']);
            unset($user['confpass']);
            session()->set('is_loggedin', true);
            session()->set($user);
            $email = session()->get('email');
            $user_id = session()->get('id');
            $uniqid = uniqid($user_id . '_');
            $device['session_id'] = $uniqid;
            $device['email'] =  $email;
            session()->set('session_id', $uniqid);
            $devices->insert($device);
            return redirect()->to('/topics');
          } else {
            return redirect()->to('/login')->with('message', 'UserID currently in use');
          }
        } else {
          return redirect()->to('/login')->with('message', 'The user name or password you entered is incorrect');
        }
      }
      else{
        return redirect()->to('/login')->with('message', "User Doesn't Exist");
      }
    }

    $data['page'] = view('frontend/sign_in', $page);
    return view("frontend/template", $data);
  }
}
