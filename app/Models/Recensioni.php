<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recensioni extends Model{
    protected $table = "recensioni";
    protected $primaryKey = "id_rec";
    public $timestamps = false;


    public function user(){
        return $this->belongsTo("App\Models\User", "id_user");
    }

    public function reviewPreferite(){
        return $this->belongsToMany("App\Models\User", "preferiti", "user", "review");
    }

}

?>
    

