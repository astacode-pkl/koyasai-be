<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;


class Gallery extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'galleries';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->setDescriptionForEvent(fn(string $eventName) => auth()->user()->name . " {$eventName} Gallery");
    }
    public function images()
    {
        return fn() => $url = asset('images/gallery/' . $this->image);
    }
}
