<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loadViewData()
{
    $viewData = [];

    // Check for flash errors
    if (session('error')) {
        $viewData['error'] = session('error');
        $viewData['errorDetail'] = session('errorDetail');
    }

    // Check for logged on user
    if (session('token'))
    {
        $viewData['fullName'] = session('fullName');
        $viewData['email']    = session('email');
        $viewData['role']     = session('role');
        $viewData['token']    = session('token');
        $viewData['businessName'] = session('businessName');
        $viewData['phone'] = session('phone');
        $viewData['dob'] = session('dob');
        $viewData['userType'] = session('userType');
    }

    return $viewData;
}


}
