<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPassWordController extends Controller
{
    //
    public function getViewResetPassWord(){
        return view('reset-password');
    }
}
