<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function getFamilies()
    {
        $users = User::where('role', 'family')->get();
        return datatables()->of($users)->make(true);
    }

    public function getPatients()
    {
        $users = User::where('role', 'patient')->get();
        return datatables()->of($users)->make(true);
    }

    public function getDoctors()
    {
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
    public function create_service()
    {
        return view('admin.add-service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_service(Request $request)
    {
        $service                    = new Service();
        $service->title             = $request->title;
        $service->short_description = $request->short_description;
        $service->description       = $request->description;

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = time() . '-' . $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('services/thumbnails/'), $thumbnailPath);
            $service->thumbnail = 'services/thumbnails/' . $thumbnailPath;
        }
        $service->icon_img = $request->icon;
        $service->save();
        return redirect()->route('admin.services');
    }

    /**
     * Display the specified resource.
     */
    public function show_service()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function search(Request $request)
    {
        $query = $request->query('query');

        if (! $query) {
            return response()->json([], 200);
        }
        $services = Service::where('title', 'LIKE', '%' . $query . '%')->get();
        return response()->json($services);
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
