<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Controllers\AdminAuth;
use App\Models\Device;
use App\Models\Subscription;

class Dashboard extends AdminAuth
{
  public function index()
  {
    $user = new User();
    $subscription = new Subscription();
    $devicesModel = new Device();
    $page['users'] = $user->countAllResults();
    $page['connected'] = $devicesModel->countAllResults();
    $TotalAmount = $subscription->selectSum('price')->first();
    $page['payment'] = $TotalAmount['price'];
    $data['page'] = view('backend/dashboard', $page);
    return view("backend/template", $data);
  }
}
