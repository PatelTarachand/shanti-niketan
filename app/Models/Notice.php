<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'priority',
        'is_active',
        'publish_date',
        'expire_date',
        'attachment',
        'created_by',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expire_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('publish_date', '<=', now())
                    ->where(function($q) {
                        $q->whereNull('expire_date')
                          ->orWhere('expire_date', '>=', now());
                    });
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
