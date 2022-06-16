<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;


use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController
{   
    public function index(){
        if(Session::get("user_id") != null){
            return redirect("home");
        }else{
            $error = Session::get("error");
            Session::forget("error");
            return view("login")->with("error", $error);
        }
    }

    public function login(){
        $request = request();
        $query = User::where("username", $request["username"])->first();
        if($query !== null){
            if(password_verify($request["password"], $query["password"])){
                Session::put("user_id", $query->id);
                return redirect("home");
            }else{
                Session::put("error", "errore");
                return redirect("login")->withInput();
            }
        }else{
            Session::put("error", "errore");
            return redirect("login")->withInput();
        }
    }

    public function logout(){
        Session::flush();
        return redirect("login");
    }
}

?>