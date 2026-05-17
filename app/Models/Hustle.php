<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hustle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'hustle_category_id',
        'description',
        'revenue_potential',
        'effort_level',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hustle) {
            if (empty($hustle->slug)) {
                $hustle->slug = \Illuminate\Support\Str::slug($hustle->name);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HustleCategory::class, 'hustle_category_id');
    }
}

