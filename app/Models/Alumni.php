<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alumni extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'student_id',
        'course',
        'branch',
        'passing_year',
        'admission_year',
        'current_company',
        'current_position',
        'current_location',
        'current_salary',
        'bio',
        'testimonial',
        'profile_photo',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'website_url',
        'achievements',
        'skills',
        'is_featured',
        'is_active',
        'show_contact',
        'available_for_mentoring',
        'experience_years',
        'industry',
        'address',
        'verified_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'show_contact' => 'boolean',
        'available_for_mentoring' => 'boolean',
        'achievements' => 'array',
        'skills' => 'array',
        'current_salary' => 'decimal:2',
        'verified_at' => 'datetime',
        'passing_year' => 'integer',
        'admission_year' => 'integer',
        'experience_years' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeVerified($query)
    {
        return $query->whereNotNull('verified_at');
    }

    public function scopeByCourse($query, $course)
    {
        return $query->where('course', $course);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('passing_year', $year);
    }

    public function scopeByIndustry($query, $industry)
    {
        return $query->where('industry', $industry);
    }

    public function scopeMentors($query)
    {
        return $query->where('available_for_mentoring', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('is_featured', 'desc')
                    ->orderBy('passing_year', 'desc')
                    ->orderBy('name');
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }

        // Generate placeholder with initials
        $initials = collect(explode(' ', $this->name))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->take(2)
            ->join('');

        return "https://via.placeholder.com/150x150/FFD700/2C3E50?text={$initials}";
    }

    public function getExperienceTextAttribute()
    {
        if ($this->experience_years == 0) {
            return 'Fresher';
        } elseif ($this->experience_years == 1) {
            return '1 Year Experience';
        } else {
            return $this->experience_years . ' Years Experience';
        }
    }

    public function getAchievementsListAttribute()
    {
        return $this->achievements ? implode(', ', $this->achievements) : '';
    }

    public function getSkillsListAttribute()
    {
        return $this->skills ? implode(', ', $this->skills) : '';
    }

    public function getIsVerifiedAttribute()
    {
        return !is_null($this->verified_at);
    }

    public function getYearsSinceGraduationAttribute()
    {
        return Carbon::now()->year - $this->passing_year;
    }

    public function getSocialLinksAttribute()
    {
        $links = [];

        if ($this->linkedin_url) {
            $links['linkedin'] = $this->linkedin_url;
        }
        if ($this->twitter_url) {
            $links['twitter'] = $this->twitter_url;
        }
        if ($this->facebook_url) {
            $links['facebook'] = $this->facebook_url;
        }
        if ($this->website_url) {
            $links['website'] = $this->website_url;
        }

        return $links;
    }
}
