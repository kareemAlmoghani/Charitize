<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use Trans;
    protected $guarded=[];

    public function casts(){
        return [
            'title'=>'array',
        ];
    }
}
