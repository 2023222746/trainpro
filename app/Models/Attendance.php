<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'enrolment_id',
        'date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * The enrolment that this attendance belongs to.
     */
    public function enrolment(): BelongsTo
    {
        return $this->belongsTo(Enrolment::class);
    }

    /**
     * Check if attendance is present.
     */
    public function isPresent(): bool
    {
        return $this->status === 'present';
    }

    /**
     * Check if attendance is absent.
     */
    public function isAbsent(): bool
    {
        return $this->status === 'absent';
    }

    /**
     * Scope a query to only include present attendances.
     */
    public function scopePresent($query)
    {
        return $query->where('status', 'present');
    }

    /**
     * Scope a query to only include absent attendances.
     */
    public function scopeAbsent($query)
    {
        return $query->where('status', 'absent');
    }
}
