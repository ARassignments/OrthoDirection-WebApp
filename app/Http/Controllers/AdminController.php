<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use Stripe\Balance;
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
use App\Models\Appoinment;
use App\Models\Appointment;
use App\Models\DeviceLog;
use App\Models\Newsletter;
use App\Models\Contact;
use App\Models\Plan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Output\NullOutput;

class AdminController extends Controller
{

    public function getFamilies()
    {
        $users = User::where('role', 'family')->with(['adminProfile:id,user_id,profile_img'])->get();
        return datatables()->of($users)->make(true);
    }

    public function familyDetail($id)
    {
        $family = User::where('role', 'family')
            ->with([
                'adminProfile'
            ])
            ->findOrFail($id);

        if (!$family) {
            return response()->json(['error' => 'Family Member not found!']);
        }

        return view('doctor.family.family-detail', [
            'family' => $family
        ]);
    }

    // Patients
    public function getPatients()
    {
        $users = User::where('role', 'patient')->with(['adminProfile:id,user_id,profile_img'])->get();
        return datatables()->of($users)->make(true);
    }

    public function patientDetail($id)
    {
        $patient = User::where('role', 'patient')
            ->with([
                'adminProfile',
                'patientAppointments' => function ($query) use ($id) {
                    $query->where('patient_id', $id)
                        ->select('doctor_id', 'patient_id', 'date', 'slot', 'status');
                }
            ])
            ->findOrFail($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found!']);
        }

        return view('doctor.patients.patients-detail', [
            'patient' => $patient,
            'appointments' => $patient->patientAppointments
        ]);
    }

    public function getDoctors()
    {
        $users = User::where('role', 'doctor')->with(['adminProfile:id,user_id,profile_img'])->get();
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

    // Stripe API
    public function checkStripeApiKey()
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Balance::retrieve();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    // CRUD Plans
    public function planStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'plan_type' => ['required', Rule::in(['free', 'paid'])],
            'monthly_price' => 'nullable|numeric|min:0',
            'yearly_price' => 'nullable|numeric|min:0',
            'features' => 'nullable|array',
            'features.*.name' => 'required|string|max:255',
            'features.*.status' => 'required|in:0,1',
            'plan_popular' => 'required|in:0,1',
        ]);

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripeProduct = Product::create([
            'name' => $request->name,
            'type' => 'service',
        ]);

        $monthlyPriceId = null;
        $yearlyPriceId = null;

        if ($request->plan_type === 'paid') {
            if ($request->monthly_price) {
                $monthlyPrice = Price::create([
                    'unit_amount' => $request->monthly_price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'month'],
                    'product' => $stripeProduct->id,
                ]);
                $monthlyPriceId = $monthlyPrice->id;
            }

            if ($request->yearly_price) {
                $yearlyPrice = Price::create([
                    'unit_amount' => $request->yearly_price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'year'],
                    'product' => $stripeProduct->id,
                ]);
                $yearlyPriceId = $yearlyPrice->id;
            }
        }

        $featuresArray = [];
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $featuresArray[] = [
                    'name' => $feature['name'],
                    'status' => (bool) $feature['status'],
                ];
            }
        }

        Plan::create([
            'name' => $request->name,
            'monthly_price' => $request->plan_type === 'paid' ? $request->monthly_price : null,
            'yearly_price' => $request->plan_type === 'paid' ? $request->yearly_price : null,
            'features' => json_encode($featuresArray),
            'plan_type' => $request->plan_type,
            'plan_popular' => (bool) $request->plan_popular,
            'status' => (bool) $request->status,
            'stripe_product_id' => $stripeProduct->id,
            'stripe_price_id_monthly' => $monthlyPriceId,
            'stripe_price_id_yearly' => $yearlyPriceId,
        ]);
        return response()->json(['success' => 'Plan Created Successfully!']);
    }

    public function planFetch(Request $request)
    {
        $query = Plan::query();
        $plans = $query->orderBy('created_at', 'desc')->get();
        return response()->json($plans);
    }

    public function planEdit($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return response()->json(['error' => 'Plan not found!']);
        }
        return view('admin.plans.edit-plan', compact(['plan' => 'plan']));
    }

    public function planUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'plan_type' => ['required', Rule::in(['free', 'paid'])],
            'monthly_price' => 'nullable|numeric|min:0',
            'yearly_price' => 'nullable|numeric|min:0',
            'features' => 'nullable|array',
            'features.*.name' => 'required|string|max:255',
            'features.*.status' => 'required|in:0,1',
            'plan_popular' => 'required|in:0,1',
        ]);

        $featuresArray = [];
        if ($request->has('features')) {
            foreach ($request->features as $feature) {
                $featuresArray[] = [
                    'name' => $feature['name'],
                    'status' => (bool) $feature['status'],
                ];
            }
        }

        $plan = Plan::find($id);
        if (!$plan) {
            return response()->json(['error' => 'Plan not found!']);
        }

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        Product::update($plan->stripe_product_id, [
            'name' => $request->name,
        ]);
        if ($request->plan_type === 'paid') {
            if ($request->monthly_price) {
                if ($plan->stripe_price_id_monthly) {
                    Price::update($plan->stripe_price_id_monthly, ['active' => false]);
                }
                $monthlyPrice = Price::create([
                    'product' => $plan->stripe_product_id,
                    'unit_amount' => $request->monthly_price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'month'],
                ]);
                $plan->stripe_price_id_monthly = $monthlyPrice->id;
            }

            if ($request->yearly_price) {
                if ($plan->stripe_price_id_yearly) {
                    Price::update($plan->stripe_price_id_yearly, ['active' => false]);
                }
                $yearlyPrice = Price::create([
                    'product' => $plan->stripe_product_id,
                    'unit_amount' => $request->yearly_price * 100,
                    'currency' => 'usd',
                    'recurring' => ['interval' => 'year'],
                ]);
                $plan->stripe_price_id_yearly = $yearlyPrice->id;
            }
        } else {
            if ($plan->stripe_price_id_monthly) {
                Price::update($plan->stripe_price_id_monthly, ['active' => false]);
                $plan->stripe_price_id_monthly = null;
            }
            if ($plan->stripe_price_id_yearly) {
                Price::update($plan->stripe_price_id_yearly, ['active' => false]);
                $plan->stripe_price_id_yearly = null;
            }
        }


        $plan->name = $request->name;
        $plan->monthly_price = $request->plan_type === 'paid' ? $request->monthly_price : null;
        $plan->yearly_price = $request->plan_type === 'paid' ? $request->yearly_price : null;
        $plan->features = json_encode($featuresArray);
        $plan->plan_type = $request->plan_type;
        $plan->plan_popular = (bool) $request->plan_popular;
        $plan->status = (bool) $request->status;
        $plan->save();
        return response()->json(['success' => 'Plan Updated Successfully!']);
    }

    public function planDestroy($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return response()->json(['error' => 'Plan not found!']);
        }
        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            if ($plan->stripe_price_id_monthly) {
                $monthlyPrice = Price::retrieve($plan->stripe_price_id_monthly);
                $monthlyPrice->delete();
            }

            if ($plan->stripe_price_id_yearly) {
                $yearlyPrice = Price::retrieve($plan->stripe_price_id_yearly);
                $yearlyPrice->delete();
            }
            $stripeProduct = Product::retrieve($plan->stripe_product_id);
            $stripeProduct->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete from Stripe: ' . $e->getMessage()]);
        }
        $plan->delete();
        return response()->json(['success' => 'Plan Deleted Successfully!']);
    }

    public function planToggleStatus($id)
    {
        $plan = Plan::find($id);
        if (!$plan) {
            return response()->json(['error' => 'Plan not found!']);
        }
        $plan->status = !$plan->status;
        $plan->save();
        return response()->json(['success' => 'Plan Status Updated!', 'status' => $plan->status]);
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

    // Appointments
    public function patientAppointmentFetch($id)
    {
        $doctor = Appointment::where('patient_id', $id)
            ->select('id', 'doctor_id', 'treatment_type', 'user_cancellation_reason', 'doctor_cancellation_reason', 'user_cancelled', 'patient_id', 'date', 'slot', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        return datatables()->of($doctor)->make(true);
    }

    public function assignFamilyMember(Request $request, $patientId)
    {
        $patient = User::findOrFail($patientId);
        $request->validate([
            'family_member_id' => 'required|exists:users,id',
            'relation' => 'required|string'
        ]);
        $exists = $patient->familyMembers()->wherePivot('family_member_id', $request->family_member_id)->exists();
        if ($exists) {
            return response()->json(['error' => 'Family Member is already assigned']);
        }

        $patient->familyMembers()->attach($request->family_member_id, ['relation' => $request->relation]);
        return response()->json(['success' => 'Family Member linked successfully']);
    }
}
