<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'location',
        'activity_date',
        'image',
        'is_active',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
