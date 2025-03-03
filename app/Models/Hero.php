<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Hero extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'heroes';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->setDescriptionForEvent(fn(string $eventName) => auth()->user()->name . " {$eventName} Hero");
    }
}
