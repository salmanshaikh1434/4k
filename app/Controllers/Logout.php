<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        $is_admin = $this->request->getGet('is_admin');
        session()->destroy();
        if ($is_admin)
            return redirect()->to('/');
        return redirect()->to('/');
    }
}
