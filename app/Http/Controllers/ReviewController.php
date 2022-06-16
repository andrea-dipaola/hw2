<?php

namespace App\Http\Controllers;
use App\Models\Recensioni;
use Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controller as BaseController;

class ReviewController extends BaseController
{
    public function index(){
        return view("create_review");
    }

    public function createReview(){
        $request = request();
        $user = Session::get("user_id");
        $newReview = new Recensioni;
        $newReview->id_user = $user;
        $newReview->nome_locale = $request["nome_locale"];
        $newReview->descrizione = $request["descrizione"];
        $newReview->voto = $request["voto"];
        $newReview->save();
        if($newReview !== null){
            return redirect("home");
        }
    }

    public function fetchReview(){
        $query = DB::table('users')->join('recensioni', 'users.id', '=', 'recensioni.id_user')->select
        ('recensioni.id_rec AS id_rec', 'users.nome AS nome', 'users.cognome AS cognome', 
        'recensioni.nome_locale AS locale', 'recensioni.voto AS valutazione', 'recensioni.descrizione AS descrizione')->get();
        return $query;
    }
}



?>