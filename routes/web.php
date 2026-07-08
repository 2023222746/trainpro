<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/courses', [PublicController::class, 'courses'])->name('courses');
Route::get('/course/{id}', [PublicController::class, 'courseDetail'])->name('course.detail');

// Authenticated routes with role middleware
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard redirect
    Route::get('/dashboard', function () {
        $role = auth()->user()->role ?? 'participant';
        return redirect()->route($role . '.dashboard');
    })->name('dashboard');

    // Participant routes
    Route::prefix('participant')->middleware('role:participant')->group(function () {
        Route::get('/dashboard', [ParticipantController::class, 'dashboard'])->name('participant.dashboard');
        Route::get('/my-courses', [ParticipantController::class, 'myCourses'])->name('participant.my-courses');
        Route::get('/enrol/{course}', [ParticipantController::class, 'enrol'])->name('participant.enrol');
        Route::post('/enrol', [ParticipantController::class, 'storeEnrolment'])->name('participant.enrol.store');
        Route::get('/payment/{enrolment}', [ParticipantController::class, 'payment'])->name('participant.payment');
        Route::post('/payment/confirm', [ParticipantController::class, 'confirmPayment'])->name('participant.payment.confirm');
    });

    // Admin routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/courses', [AdminController::class, 'courses'])->name('admin.courses');
        Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    });

    // Trainer routes
    Route::prefix('trainer')->middleware('role:trainer')->group(function () {
        Route::get('/dashboard', [TrainerController::class, 'dashboard'])->name('trainer.dashboard');
        Route::get('/attendance', [TrainerController::class, 'attendance'])->name('trainer.attendance');
        Route::get('/grading', [TrainerController::class, 'grading'])->name('trainer.grading');
    });

    // Owner routes
    Route::prefix('owner')->middleware('role:owner')->group(function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    });
});

require __DIR__.'/auth.php';
