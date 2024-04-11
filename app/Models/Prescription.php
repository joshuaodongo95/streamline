<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['drug_id', 'number_of_drugs','medication']);
    }

    protected $fillable = [
        'drug_id',
        'number_of_drugs',
        'medication',
        'instructions',
        'issued',
        'user_id',
        'patient_id'
    ];
    
}
