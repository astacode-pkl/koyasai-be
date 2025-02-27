<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class News extends Model
{
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->setDescriptionForEvent(fn(string $eventName) => "Gallery {$eventName}");;
        
    }
    public function images() {
        return fn() => $url = asset('images/news/'.$this->image) ;
    }
}
