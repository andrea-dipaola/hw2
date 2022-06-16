<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    public $timestamps = false;

    public function recensioni(){
        return $this->hasMany("App\Models\Recensioni", "id_user");
    }

    public function reviewPreferite(){
        return $this->belongsToMany("App\Models\Recensioni", "preferiti", "user", "review");
    }
}

?>