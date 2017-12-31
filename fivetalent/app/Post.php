<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // Making a relationship to the user and their listings

    public function user(){

        return $this->belongsTo('App\User');
    }

}
