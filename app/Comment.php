<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public function category() {
        return $this->belongsTo("App\post");
    }

}
