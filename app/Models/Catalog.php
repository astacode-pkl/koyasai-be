<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Catalog extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];
    protected $table = 'catalogs';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }
    public function tapActivity(Activity $activity)
    {
        $activity->causer_name = Auth::user()->name;
    }
    public function images()
    {
        return fn() => $url = asset('images/catalogs/' . $this->image);
    }
}
