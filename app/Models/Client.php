<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
    protected $table = 'clients';
    protected $guarded = ['id'];

    // protected $appends = ['images_url'];
    // public function getImagesUrlAttribute(){
    //     return $this->images ? url('images/clients/' . $this->logo) : null;
    // }
}
