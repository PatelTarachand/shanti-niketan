<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'department',
        'duration_years',
        'total_semesters',
        'fees_per_semester',
        'total_seats',
        'available_seats',
        'eligibility_criteria',
        'is_active',
    ];

    protected $casts = [
        'eligibility_criteria' => 'array',
        'is_active' => 'boolean',
        'fees_per_semester' => 'decimal:2',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    public function getAvailabilityStatusAttribute()
    {
        if ($this->available_seats <= 0) {
            return 'full';
        } elseif ($this->available_seats <= 10) {
            return 'limited';
        } else {
            return 'available';
        }
    }

    public function getTotalFeesAttribute()
    {
        return $this->fees_per_semester * $this->total_semesters;
    }
}
