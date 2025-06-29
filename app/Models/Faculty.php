<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    protected $fillable = [
        'name',
        'designation',
        'department',
        'qualification',
        'specialization',
        'experience_years',
        'email',
        'phone',
        'image',
        'bio',
        'research_interests',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'research_interests' => 'array',
        'is_active' => 'boolean',
        'experience_years' => 'integer',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
