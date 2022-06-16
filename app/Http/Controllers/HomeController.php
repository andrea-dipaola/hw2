<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index(){
        $session_id = Session::get("user_id");
        $user = User::find($session_id);
        return view("home")->with("user", $user);
    }
}



?>