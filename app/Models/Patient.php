<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['file_number','first_name', 'last_name']);
    }
   
    protected $fillable = [
        'file_number',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'phone_number',
        'next_of_kin',
        'next_of_kin_phone'
    ];
    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }

    public function diagnoses(): HasMany
    {
        return $this->hasMany(Diagnosis::class);
    }
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
