<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Trans;
    protected $guarded=[];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function casts()
        {
            return [
                'title'=>'array',
                'content'=>'array',
            ];
        }
}
