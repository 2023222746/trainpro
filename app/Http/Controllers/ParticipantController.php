<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function dashboard()
    {
        return view('participant.dashboard');
    }

    public function myCourses()
    {
        return view('participant.my-courses');
    }

    public function enrol($course)
    {
        return view('participant.enrol', compact('course'));
    }

    public function storeEnrolment(Request $request)
    {
        // Store enrolment logic
        return redirect()->route('participant.payment', ['enrolment' => 1]);
    }

    public function payment($enrolment)
    {
        return view('participant.payment', compact('enrolment'));
    }

    public function confirmPayment(Request $request)
    {
        // Confirm payment logic
        return redirect()->route('participant.my-courses')->with('success', 'Payment confirmed!');
    }
}
