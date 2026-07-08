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
    // Dashboard redirect based on role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        return redirect()->route($role . '.dashboard');
    })->name('dashboard');

    // Participant routes
    Route::prefix('participant')->middleware('role:participant')->group(function () {
        Route::get('/dashboard', [ParticipantController::class, 'dashboard'])->name('participant.dashboard');
        Route::get('/enrol/{course}', [ParticipantController::class, 'enrol'])->name('participant.enrol');
        Route::post('/enrol', [ParticipantController::class, 'storeEnrolment'])->name('participant.enrol.store');
        Route::get('/payment/{enrolment}', [ParticipantController::class, 'payment'])->name('participant.payment');
        Route::post('/payment/confirm', [ParticipantController::class, 'confirmPayment'])->name('participant.payment.confirm');
        Route::get('/my-courses', [ParticipantController::class, 'myCourses'])->name('participant.my-courses');
    });

    // Admin routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // ... other admin routes
    });

    // Trainer routes
    Route::prefix('trainer')->middleware('role:trainer')->group(function () {
        Route::get('/dashboard', [TrainerController::class, 'dashboard'])->name('trainer.dashboard');
        // ... other trainer routes
    });

    // Owner routes
    Route::prefix('owner')->middleware('role:owner')->group(function () {
        Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
        // ... other owner routes
    });
});

require __DIR__.'/auth.php';
