<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $guarded = ['id'];

    
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($image) => $image ? url('images/galleries/' . $image) : null,
    //     );
    // }
}
