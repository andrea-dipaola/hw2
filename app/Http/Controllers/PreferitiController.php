<?php

namespace App\Http\Controllers;
use App\Models\User;

use Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controller as BaseController;

class PreferitiController extends BaseController
{
    public function index(){
        $session_id = Session::get("user_id");
        $user = User::find($session_id);
        return view("lista_preferiti")->with("user", $user);
    }
    
    public function preferitiReview($id){
        $user = User::find(Session::get("user_id"));

        $user->reviewPreferite()->attach($id);

        if($user !== null){
            return true;
        }else{
            return false;
        }
    }


    public function fetchReviewPreferiti(){
        $user = Session::get("user_id");

        $query = DB::table('users')->join('preferiti', 'users.id', '=', 'preferiti.user')->
        join('recensioni', 'recensioni.id_rec', '=', 'preferiti.review')->where('users.id', '=', $user)->
        select ('recensioni.id_rec AS id_rec', 'recensioni.nome_locale AS locale', 'recensioni.voto AS valutazione', 
        'recensioni.descrizione AS descrizione')->get();

        return $query;
    }

    public function rimuoviPreferito($id_recensione){
        $user = User::find(Session::get("user_id"));

        $user->reviewPreferite()->detach($id_recensione);

        if($user !== null){
            return true;
        }else{
            return false;
        }
        
    }

}



?>