<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrolment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'amount',
        'payment_status',
        'enrolment_date',
        'attended',
        'grade_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enrolment_date' => 'datetime',
        'amount' => 'decimal:2',
        'attended' => 'boolean',
    ];

    /**
     * The participant (user) who enrolled.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The course being enrolled in.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * The payment associated with this enrolment.
     */
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * The grade associated with this enrolment.
     */
    public function grade(): HasOne
    {
        return $this->hasOne(Grade::class);
    }

    /**
     * Attendance records for this enrolment.
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Check if the enrolment is confirmed.
     */
    public function isConfirmed(): bool
    {
        return $this->payment_status === 'confirmed';
    }

    /**
     * Check if the enrolment is pending.
     */
    public function isPending(): bool
    {
        return $this->payment_status === 'pending';
    }

    /**
     * Check if the enrolment is completed (course finished).
     */
    public function isCompleted(): bool
    {
        return $this->payment_status === 'confirmed' && $this->attended === true;
    }
}
