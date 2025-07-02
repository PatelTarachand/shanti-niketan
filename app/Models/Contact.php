<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'course',
        'subject',
        'message',
        'status',
        'replied_at',
        'replied_by',
        'admin_notes'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Status constants
    const STATUS_NEW = 'new';
    const STATUS_READ = 'read';
    const STATUS_REPLIED = 'replied';
    const STATUS_RESOLVED = 'resolved';

    // Scopes
    public function scopeNew($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }

    public function scopeRead($query)
    {
        return $query->where('status', self::STATUS_READ);
    }

    public function scopeReplied($query)
    {
        return $query->where('status', self::STATUS_REPLIED);
    }

    public function scopeResolved($query)
    {
        return $query->where('status', self::STATUS_RESOLVED);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Relationships
    public function repliedBy()
    {
        return $this->belongsTo(Admin::class, 'replied_by');
    }

    // Accessors
    public function getStatusBadgeAttribute()
    {
        $badges = [
            self::STATUS_NEW => '<span class="badge bg-primary">New</span>',
            self::STATUS_READ => '<span class="badge bg-info">Read</span>',
            self::STATUS_REPLIED => '<span class="badge bg-warning">Replied</span>',
            self::STATUS_RESOLVED => '<span class="badge bg-success">Resolved</span>',
        ];

        return $badges[$this->status] ?? '<span class="badge bg-secondary">Unknown</span>';
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('M d, Y \a\t h:i A');
    }

    public function getTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    // Methods
    public function markAsRead($adminId = null)
    {
        $this->update([
            'status' => self::STATUS_READ,
            'replied_by' => $adminId
        ]);
    }

    public function markAsReplied($adminId = null, $notes = null)
    {
        $this->update([
            'status' => self::STATUS_REPLIED,
            'replied_at' => now(),
            'replied_by' => $adminId,
            'admin_notes' => $notes
        ]);
    }

    public function markAsResolved($adminId = null, $notes = null)
    {
        $this->update([
            'status' => self::STATUS_RESOLVED,
            'replied_at' => now(),
            'replied_by' => $adminId,
            'admin_notes' => $notes
        ]);
    }
}
