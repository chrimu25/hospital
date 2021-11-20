<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'patient',
        'hospital',
        'doctor',
        'comment',
        'valid_until',
    ];

    /**
     * Get the patient that owns the Prescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'id','doctor');
    }

    public function hospital()
    {
        return $this->belongsTo(User::class, 'hospital', 'id');
    }
}
