<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function courses()
    {
        return view('public.courses');
    }

    public function courseDetail($id)
    {
        return view('public.course-detail', compact('id'));
    }
}
