<?php
namespace App\Traits;
trait Trans{
    public function getTitleTransAttribute(){
        return $this->title[app()->getLocale()]??'';
    }
     public function getContentTransAttribute(){
        return $this->content[app()->getLocale()]??'';
    }
    public function getPositionTransAttribute(){
        return $this->position[app()->getLocale()]??'';
    }
}