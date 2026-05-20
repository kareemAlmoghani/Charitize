<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use Trans;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

        // relation between cause & payment
    public function donations(){
        return $this->hasMany(Payment::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function gallery(){
        return $this->morphMany(Image::class,'imageable')->where('type','gallery');
    }

    public function casts(){
        return[
            'title'=>'array',
            'content'=>'array',
        ];
    }
    public function getRaisedAttribute(){
        return $this->donations->sum('amount');
    }
}
