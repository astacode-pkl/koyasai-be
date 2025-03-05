<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Client extends Model
{

    protected $table = 'clients';
    protected $fillable = ['image'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded();
    }
    public function tapActivity(Activity $activity)
    {
        $activity->causer_name = Auth::user()->name;
    }
}
