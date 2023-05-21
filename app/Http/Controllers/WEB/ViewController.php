<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function loginIndex()
    {
        return view('auth.login');
    }
    public function registerIndex()
    {

        return view('auth.register');
    }
    public function forgotPasswordIndex()
    {

        return view('auth.forgot-password');
    }
    public function changePasswordIndex($remember_token)
    {

        $data_user = User::where("remember_token", $remember_token)->get();
        return view('auth.change-password', compact("data_user"));
    }
}
