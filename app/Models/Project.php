<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'features' => 'array',
        'gallery' => 'array',
        'technologies' => 'array',
        'metrics' => 'array',
        'challenges' => 'array',
        'results' => 'array',
        'featured' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function booted()
    {
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getLiveUrlAttribute(?string $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (str_contains($value, 'localhost') || str_contains($value, '127.0.0.1')) {
            return url('/');
        }

        return $value;
    }
}
