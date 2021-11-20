<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [
        'user_id',
        'impairement',
        'impairement1',
        'impairement2',
        'impairement3',
        'impairement4',
        'impairement5',
        'level',
        'diagnosed_at',
        'diagnosed_on',
    ];

    /**
     * Get the hospital that owns the Disease
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hospital()
    {
        return $this->belongsTo(User::class, 'diagnosed_on', 'id');
    }
}
