<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Stop extends Model
{
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}

