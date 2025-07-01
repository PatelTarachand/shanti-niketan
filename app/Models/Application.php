<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Application extends Model
{
    protected $fillable = [
        'application_number',
        'name',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'father_name',
        'mother_name',
        'father_occupation',
        'guardian_phone',
        'address',
        'city',
        'state',
        'pincode',
        'course',
        'branch',
        'category',
        'last_exam',
        'board_university',
        'percentage',
        'passing_year',
        'entrance_exam',
        'previous_qualification',
        'previous_marks',
        'previous_percentage',
        'previous_school_college',
        'previous_passing_year',
        'documents',
        'status',
        'remarks',
        'application_fee_paid',
        'application_fee_amount',
        'payment_reference',
        'submitted_at',
        'reviewed_at',
        'reviewed_by',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'documents' => 'array',
        'application_fee_paid' => 'boolean',
        'application_fee_amount' => 'decimal:2',
        'previous_marks' => 'decimal:2',
        'previous_percentage' => 'decimal:2',
        'previous_passing_year' => 'integer',
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_UNDER_REVIEW = 'under_review';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_WAITLISTED = 'waitlisted';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_WAITLISTED => 'Waitlisted',
        ];
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeUnderReview($query)
    {
        return $query->where('status', self::STATUS_UNDER_REVIEW);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeRejected($query)
    {
        return $query->where('status', self::STATUS_REJECTED);
    }

    public function scopeWaitlisted($query)
    {
        return $query->where('status', self::STATUS_WAITLISTED);
    }

    public function scopeByCourse($query, $course)
    {
        return $query->where('course', $course);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors
    public function getStatusBadgeAttribute()
    {
        $badges = [
            self::STATUS_PENDING => 'bg-warning',
            self::STATUS_UNDER_REVIEW => 'bg-info',
            self::STATUS_APPROVED => 'bg-success',
            self::STATUS_REJECTED => 'bg-danger',
            self::STATUS_WAITLISTED => 'bg-secondary',
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getStatusTextAttribute()
    {
        return self::getStatuses()[$this->status] ?? 'Unknown';
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }

    public function getDaysSubmittedAttribute()
    {
        return $this->submitted_at ? $this->submitted_at->diffInDays(now()) : null;
    }

    // Relationships
    public function reviewer()
    {
        return $this->belongsTo(Admin::class, 'reviewed_by');
    }

    // Methods
    public function generateApplicationNumber()
    {
        $year = date('Y');
        $lastApplication = self::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $sequence = $lastApplication ? (int)substr($lastApplication->application_number, -4) + 1 : 1;

        return 'SNC' . $year . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    public function markAsSubmitted()
    {
        $this->update([
            'submitted_at' => now(),
            'status' => self::STATUS_PENDING
        ]);
    }

    public function markAsUnderReview($adminId = null)
    {
        $this->update([
            'status' => self::STATUS_UNDER_REVIEW,
            'reviewed_at' => now(),
            'reviewed_by' => $adminId
        ]);
    }

    public function approve($adminId = null, $remarks = null)
    {
        $this->update([
            'status' => self::STATUS_APPROVED,
            'reviewed_at' => now(),
            'reviewed_by' => $adminId,
            'remarks' => $remarks
        ]);
    }

    public function reject($adminId = null, $remarks = null)
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
            'reviewed_at' => now(),
            'reviewed_by' => $adminId,
            'remarks' => $remarks
        ]);
    }

    public function waitlist($adminId = null, $remarks = null)
    {
        $this->update([
            'status' => self::STATUS_WAITLISTED,
            'reviewed_at' => now(),
            'reviewed_by' => $adminId,
            'remarks' => $remarks
        ]);
    }
}
