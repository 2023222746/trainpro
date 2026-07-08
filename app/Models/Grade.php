<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'enrolment_id',
        'assignment_score',
        'quiz_score',
        'attendance_score',
        'total_score',
        'grade_letter',
        'feedback',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'assignment_score' => 'decimal:2',
        'quiz_score' => 'decimal:2',
        'attendance_score' => 'decimal:2',
        'total_score' => 'decimal:2',
    ];

    /**
     * The enrolment that this grade belongs to.
     */
    public function enrolment(): BelongsTo
    {
        return $this->belongsTo(Enrolment::class);
    }

    /**
     * Calculate the total score based on components.
     * If you want auto-calculation, you can call this before save.
     */
    public function calculateTotal(): float
    {
        $this->total_score = ($this->assignment_score + $this->quiz_score + $this->attendance_score) / 3;
        return $this->total_score;
    }

    /**
     * Determine the grade letter based on total score.
     */
    public function calculateGradeLetter(): string
    {
        $score = $this->total_score ?? $this->calculateTotal();
        if ($score >= 90) return 'A';
        if ($score >= 80) return 'B';
        if ($score >= 70) return 'C';
        if ($score >= 60) return 'D';
        return 'F';
    }

    /**
     * Get the formatted grade letter with a badge class.
     */
    public function getGradeBadgeClassAttribute(): string
    {
        return match ($this->grade_letter) {
            'A' => 'success',
            'B' => 'primary',
            'C' => 'warning',
            'D' => 'info',
            'F' => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Boot the model to auto-calculate total and grade letter.
     */
    protected static function booted()
    {
        static::saving(function ($grade) {
            if (is_null($grade->total_score)) {
                $grade->calculateTotal();
            }
            if (is_null($grade->grade_letter)) {
                $grade->grade_letter = $grade->calculateGradeLetter();
            }
        });
    }
}
