<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index'); // Main SPA view
    }

    // AJAX page loader
    public function loadPage($page)
    {
        $validPages = ['home', 'about-us', 'services', 'blogs', 'contact-us', 'pricing-plans','faqs'];
        if (in_array($page, $validPages)) {
            return view("pages.$page");
        }

        return response()->json(['error' => 'Page not found'], 404);
    }
}
