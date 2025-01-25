<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class FamilyController extends Controller
{
    public function dashboard()
    {
        return view('family.dashboard');
    }

}
