<?php
namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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

    // CRUD Blogs
    public function blogStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z\s]+$/',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:300|min:10',
            'description' => 'required|string|max:1000|min:10',
            'tags' => 'required|array',
            'author' => 'required|string|max:15|min:3|regex:/^[a-zA-Z\s]+$/',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->tags = json_encode($request->tags);
        $blog->author = $request->author;
        $blog->date = now()->toDateString();
        $blog->time = now()->toTimeString();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admins_blogs_thumbnails'), $filename);
            $blog->thumbnail = $filename;
        }
        $blog->save();
        return response()->json(['success' => 'Blog Created Successfully!']);
    }

    public function blogFetch(Request $request)
    {
        $query = Blog::query();
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
        }
        $blogs = $query->orderBy('created_at', 'desc')->get();
        return response()->json($blogs);
    }

    public function blogEdit($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['error' => 'Blog not found!'], 404);
        }
        // $blog['tags'] = json_decode($blog['tags'], true);
        // return response()->json($blog);
        return view('admin.blogs.edit-blog',compact(['blog'=>'blog']));
    }

    public function blogUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z\s]+$/',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:300|min:10',
            'description' => 'required|string|max:1000|min:10',
            'tags' => 'required|array',
            'author' => 'required|string|max:15|min:3|regex:/^[a-zA-Z\s]+$/',
        ]);

        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['error' => 'Blog not found!'], 404);
        }

        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->tags = json_encode($request->tags);
        $blog->author = $request->author;

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && File::exists(public_path('admins_blogs_thumbnails/' . $blog->thumbnail))) {
                File::delete(public_path('admins_blogs_thumbnails/' . $blog->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admins_blogs_thumbnails'), $filename);
            $blog->thumbnail = $filename;
        }
        $blog->save();
        return response()->json(['success' => 'Blog Updated Successfully!']);
    }

    public function blogDestroy($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['error' => 'Blog not found!'], 404);
        }
        if ($blog->thumbnail && File::exists(public_path('admins_blogs_thumbnails/' . $blog->thumbnail))) {
            File::delete(public_path('admins_blogs_thumbnails/' . $blog->thumbnail));
        }
        $blog->delete();
        return response()->json(['success' => 'Blog Deleted Successfully!']);
    }

    public function blogToggleStatus($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['error' => 'Blog not found!'], 404);
        }
        $blog->status = !$blog->status;
        $blog->save();
        return response()->json(['success' => 'Blog Status Updated!', 'status' => $blog->status]);
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
        $services = Service::where('title', 'LIKE', '%' . $query . '%')->get()
            ->map(function ($service) {
            $service->thumbnail = asset($service->thumbnail);
            return $service;
        });
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
