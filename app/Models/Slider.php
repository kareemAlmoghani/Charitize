<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Slider extends Model
{
    use Trans;
    protected $guarded=[];

    public function casts(){
        return [
            'title'=>'array',
            'content'=>'array',
            'btn1_text'=>'array',
            'btn2_text'=>'array',
        ];
    }

    // هذه الدالة ترجمة علاقة morph
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }


    // Accessor Function حطيناها في التريت
    // public function getTitleTransAttribute(){
    //     return $this->title[app()->getLocale()]??'';
    // }
    //  public function getContentTransAttribute(){
    //     return $this->content[app()->getLocale()]??'';
    // }
}
