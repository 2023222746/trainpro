<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'enrolment_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status',
        'reference',
        'payment_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
    ];

    /**
     * The enrolment that this payment belongs to.
     */
    public function enrolment(): BelongsTo
    {
        return $this->belongsTo(Enrolment::class);
    }

    /**
     * Check if payment is successful.
     */
    public function isSuccessful(): bool
    {
        return $this->status === 'confirmed';
    }

    /**
     * Check if payment is pending.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if payment failed.
     */
    public function isFailed(): bool
    {
        return $this->status === 'failed';
    }

    /**
     * Get the formatted amount.
     */
    public function getFormattedAmountAttribute(): string
    {
        return 'RM ' . number_format($this->amount, 2);
    }
}
