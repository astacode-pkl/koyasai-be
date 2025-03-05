<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'companyprofile';
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded();
    }
    public function tapActivity(Activity $activity)
    {
        if (!empty(Auth::user()->name)) {
            $activity->causer_name = Auth::user()->name;
        } else {
            $activity->causer_name = null;
        }
    }
}
