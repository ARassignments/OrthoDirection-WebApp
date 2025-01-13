<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function getFamilies(){
        $users = User::where('role', 'admin')->get();
        return datatables()->of($users)->make(true);
    }
    
    public function getPatients(){
        $users = User::where('role', 'patient')->get();
        return datatables()->of($users)->make(true);
    }
    
    public function getDoctors(){
        $users = User::where('role', 'doctor')->get();
        return datatables()->of($users)->make(true);
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->status = $request->status;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Status Updated Successfully']);
        }

        return response()->json(['success' => false, 'message' => 'User not found.'], 404);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
