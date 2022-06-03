<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function authentication(){
        return view('account.authentication');
    }

    public function sshKeys(){
        return view('account.ssh-keys');
    }
}
