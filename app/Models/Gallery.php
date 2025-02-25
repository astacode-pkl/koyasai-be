<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Gallery extends Model
{
    
    protected $guarded = ['id'];
    protected $table = 'galleries';

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->setDescriptionForEvent(fn(string $eventName) => "Gallery {$eventName}");;
        
    }


}
