<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\Service;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Mail\NewsletterMail;
use App\Models\DeviceLog;
use App\Models\Newsletter;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function getFamilies()
    {
        $users = User::where('role', 'admin')->get();
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

    public function getNewsletter()
    {
        $newsletter = Newsletter::all();
        return datatables()->of($newsletter)->make(true);
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
        $device = DeviceLog::where('user_id', Auth::user()->id)->first();
        if ($device) {
            $device->update(['logged_out_at' => now()]);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // CRUD Blogs
    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['error' => 'Blog not found!'], 404);
        }
        return view('admin.blogs.detail', compact(['blog' => 'blog']));
    }

    public function blogStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z:\s]+$/',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:400|min:10',
            'description' => 'required|string|max:5000|min:10',
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
        return view('admin.blogs.edit-blog', compact(['blog' => 'blog']));
    }

    public function blogUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z:\s]+$/',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:400|min:10',
            'description' => 'required|string|max:5000|min:10',
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

    // CRUD Services
    public function serviceStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z:\s]+$/',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:400|min:10',
            'description' => 'required|string|max:5000|min:10',
            'icon_img' => 'required|string',
        ]);

        $blog = new Service();
        $blog->title = $request->title;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->icon_img = $request->icon_img;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admins_services_thumbnails'), $filename);
            $blog->thumbnail = $filename;
        }
        $blog->save();
        return response()->json(['success' => 'Service Created Successfully!']);
    }

    public function serviceFetch(Request $request)
    {
        $query = Service::query();
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $services = $query->orderBy('created_at', 'desc')->get();
        return response()->json($services);
    }

    public function serviceEdit($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found!'], 404);
        }
        return view('admin.services.edit-service', compact(['service' => 'service']));
    }

    public function serviceUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:500|min:5|regex:/^[a-zA-Z:\s]+$/',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
            'short_description' => 'required|string|max:400|min:10',
            'description' => 'required|string|max:5000|min:10',
            'icon_img' => 'required|string',
        ]);

        $service = Service::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found!'], 404);
        }

        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->icon_img = $request->icon_img;

        if ($request->hasFile('thumbnail')) {
            if ($service->thumbnail && File::exists(public_path('admins_services_thumbnails/' . $service->thumbnail))) {
                File::delete(public_path('admins_services_thumbnails/' . $service->thumbnail));
            }
            $file = $request->file('thumbnail');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admins_services_thumbnails'), $filename);
            $service->thumbnail = $filename;
        }
        $service->save();
        return response()->json(['success' => 'Service Updated Successfully!']);
    }

    public function serviceDestroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found!'], 404);
        }
        if ($service->thumbnail && File::exists(public_path('admins_services_thumbnails/' . $service->thumbnail))) {
            File::delete(public_path('admins_services_thumbnails/' . $service->thumbnail));
        }
        $service->delete();
        return response()->json(['success' => 'Service Deleted Successfully!']);
    }

    public function serviceToggleStatus($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json(['error' => 'Service not found!'], 404);
        }
        $service->status = !$service->status;
        $service->save();
        return response()->json(['success' => 'Service Status Updated!', 'status' => $service->status]);
    }


    public function contactFetch(Request $request)
    {
        $query = Contact::query();
        if ($request->has('search') && !empty($request->search)) {
            $query->where('fname', 'like', '%' . $request->search . '%')
                ->orWhere('lname', 'like', '%' . $request->search . '%');
        }
        $contacts = $query->orderBy('created_at', 'desc')->get();
        return response()->json($contacts);
    }

    public function storeNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:newsletters,email'],
            'agree' => ['required']
        ]);

        if ($validator->passes()) {
            $newsletter = Newsletter::updateOrCreate(
                ['email' => $request->email]
            );
            Mail::to($request->email)->send(new NewsletterMail($request->email));
            return response()->json([
                'status' => true,
                'msg' => "Thank you for subscribing! You've successfully joined our newsletter. Stay tuned for updates and exclusive courses!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
