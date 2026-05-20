<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use Trans;
    protected $guarded=[];

    public function casts(){
        return [
        'title'=>'array',
        'position'=>'array'
        ];
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    
}
