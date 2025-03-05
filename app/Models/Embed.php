<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Embed extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'embeds';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }
    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->causer_name = Auth::user()->name;
    }
}
