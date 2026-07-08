<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function dashboard()
    {
        return view('trainer.dashboard');
    }

    public function attendance()
    {
        return view('trainer.attendance');
    }

    public function grading()
    {
        return view('trainer.grading');
    }
}
