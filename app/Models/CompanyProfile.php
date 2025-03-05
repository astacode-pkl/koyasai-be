<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CompanyProfile extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'companyprofile';
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->setDescriptionForEvent(fn(string $eventName) => optional(auth()->user())->name . " {$eventName} Company Profile");
    }
}
