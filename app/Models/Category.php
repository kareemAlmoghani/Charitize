<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Trans;
    protected $guarded=[];


    public function casts(){
        return [
        'title'=>'array',
        ];
    }
    public function causes(){
        return $this->hasMany(Cause::class);
    }
}
