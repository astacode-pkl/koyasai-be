<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = ['id'];

    // protected $appends = ['images_url'];
    // public function getImagesUrlAtttribute(){
    //     return $this->images ? url('images/news/'.$this->images) : null;
    // }
}
