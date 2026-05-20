<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $guarded=[];

     // relation between user & payment
    public function donar(){
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }

    // relation between cause & payment
    public function cause(){
        return $this->belongsTo(Cause::class)->withDefault();
    }
}
