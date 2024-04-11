<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Diagnosis extends Model
{
    use HasFactory, SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'name',
        'code',
        'diagnosis',
        'patient_id',
        'user_id'
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }


    

}
