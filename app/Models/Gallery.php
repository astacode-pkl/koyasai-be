<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;


class Gallery extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'galleries';

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()->setDescriptionForEvent(fn(string $eventName) => "Gallery {$eventName}")->logUnguarded();
        
    }
    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->causer_id = Auth::user()->id;
        $activity->causer_name = Auth::user()->name;
    }
    public function images() {
        return fn() => $url = asset('images/gallery/'.$this->image) ;
    }
}
