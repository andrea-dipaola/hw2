<?php

namespace App\Http\Controllers;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Controller as BaseController;

class SignupController extends BaseController
{
    public function index(){
        return view("signup");
    }
    
    public function signup(){
        $request = request();
        if($this->countErrors($request) === 0){
            $request["password"] = password_hash($request["password"], PASSWORD_BCRYPT);
            $newUser = new User;
            $newUser->nome = $request["nome"];
            $newUser->cognome = $request["cognome"];
            $newUser->email = $request["email"];
            $newUser->username = $request["username"];
            $newUser->password = $request["password"];
            $newUser->save();

            if($newUser){
                Session::put("user_id", $newUser->id);
                return redirect("home");
            }else{
                return redirect("signup")->withInput();
            }
        }else{
            return redirect("signup")->withInput();
        }

    }

    private function countErrors($data){
        $error = array();

        if(!preg_match('/^[a-z0-9_-]{3,15}$/', $data["username"])){
            $error[] = "Username non valido";
        }else{
            $username = User::where("username", $data["username"])->first();
            if($username !== null){
                $error[] = "Username già esistente";
            }
        } 
        //password
        if(strlen($data["password"]) < 8){
            $error[] = "Caratteri non sufficienti";
        }
        //email
        if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
            $error[] = "Email non valida";
        }else{
            $email = User::where("email", $data["email"])->first();
            
            if($email !== null){
                $error[] = "Email già utilizzata";
            }
        }
        return count($error);
    }

    public function checkUsername($q){
        $username = User::where("username", $q)->exists();
        if($username){
            $resp = array('exists' => true);
        }else{
            $resp = array('exists' => false);
        }
        return $resp;
    }

    public function checkEmail($query){
        $email = User::where("email", $query)->exists();
        if($email){
            $resp = array('exists' => true);
        }else{
            $resp = array('exists' => false);
        }
        return $resp;
    }
}

?>