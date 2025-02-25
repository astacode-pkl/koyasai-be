<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'hero';
    protected $guarded = ['id'];

    // protected $appends = ['images_url'];
    // public function getImagesUrlAtttribute(){
    //     return $this->images ? url('images/heros/'.$this->images) : null;
    // }
}
