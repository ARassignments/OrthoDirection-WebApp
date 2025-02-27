<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\DeviceLog;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Product;
use Stripe\Price;
use Stripe\Balance;
use Stripe\Customer;
use Stripe\Subscription as StripeSubscription;
use Stripe\PaymentMethod;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class GeneralController extends Controller
{

    // Profile
    public function profileUpload(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:255',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'country' => 'required|string|max:50',
            'city' => 'required|string|max:50',
            'contact' => 'required|string|max:15|min:11',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'age' => 'required|integer|min:18|max:70',
            'address' => 'required|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $profile = AdminProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'bio' => $request->bio,
                'gender' => $request->gender,
                'country' => $request->country,
                'city' => $request->city,
                'contact' => $request->contact,
                'date_of_birth' => $request->date_of_birth,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'age' => $request->age,
                'address' => $request->address,
                'status' => $request->status ? 1 : 0,
            ]
        );

        if ($request->hasFile('profile_img')) {
            if ($profile->profile_img && File::exists(public_path('profile_images/' . $profile->profile_img))) {
                File::delete(public_path('profile_images/' . $profile->profile_img));
            }
            $file = $request->file('profile_img');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profile_images'), $filename);
            $profile->update(['profile_img' => $filename]);
        }

        return response()->json(['success' => 'Profile saved successfully!']);
    }

    public function getProfile()
    {
        $profile = AdminProfile::where('user_id', Auth::id())->first();
        return view('general.profile.edit-profile', compact('profile'));
    }
    public function getProfileDetails()
    {
        $profile = AdminProfile::where('user_id', Auth::id())->first();
        return view('general.profile.profile', compact('profile'));
    }

    // Device Logs
    public function getDevices()
    {
        $devices = DeviceLog::where('user_id', Auth::id())->latest()->get();
        return response()->json($devices);
    }

    public function logoutDevice($id)
    {
        $device = DeviceLog::findOrFail($id);
        $device->update(['logged_out_at' => now()]);
        return response()->json(['message' => 'Device logged out successfully.']);
    }

    public function logoutAllDevices()
    {
        DeviceLog::where('user_id', Auth::id())->update(['logged_out_at' => now()]);
        Auth::logout();
        return response()->json(['message' => 'You have been logged out from all devices.']);
    }

    public function ignoreTracking(Request $request)
    {
        $request->validate([
            'ignore_tracking' => 'required|boolean',
        ]);

        if ($request->ignore_tracking) {
            Session::put('ignore_tracking', true);
        } else {
            Session::forget('ignore_tracking');
        }

        return response()->json([
            'success' => true,
            'message' => $request->ignore_tracking ? 'Tracking has been ignored.' : 'Tracking enabled.',
        ]);
    }

    public function updateNotification(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:newsletter,email_notification',
            'status' => 'required|boolean',
        ]);

        $user = User::find(Auth::user()->id);

        if ($request->type === 'newsletter') {
            $user->newsletter = $request->status;
        } elseif ($request->type === 'email_notification') {
            $user->email_notification = $request->status;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Notification preferences updated successfully.',
        ]);
    }

    public function fetchNotificationsNotify()
    {
        $user = auth()->user();
        $notifications = $user->unreadNotifications()->latest()->limit(10)->get();
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $user->unreadNotifications->count()
        ]);
    }

    public function readNotifications(Request $request)
    {
        $notification = DatabaseNotification::find($request->id);
        if ($notification) {
            $notification->markAsRead();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Notification not found']);
    }

    public function fetchNotifications(Request $request)
    {
        $user = auth()->user();
        $query = $user->notifications()->latest();

        // Apply filter (All or Unread)
        if ($request->has('filter') && !empty($request->filter)) {
            if ($request->filter === "unread") {
                $query = $user->unreadNotifications()->latest();
            }
        }

        // Apply search filter on notifications
        if ($request->has('search') && !empty($request->search)) {
            $search = strtolower($request->search);
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(data, "$.message"))) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(data, "$.user_name"))) LIKE ?', ["%{$search}%"]);
            });
        }

        $notifications = $query->get();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $user->unreadNotifications()->count()
        ]);
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

    public function planFetch(Request $request)
    {
        $plans = Plan::where('status', 1)->orderBy('created_at', 'desc')->get();
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)
            ->where('status', 'active')
            ->with('plan')
            ->first();

        return response()->json([
            'plans' => $plans,
            'subscription' => $subscription
        ]);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'billing_cycle' => 'required|in:monthly,yearly',
            'payment_method' => 'required',
        ]);

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = User::where('id', Auth::user()->id)->first();
        $plan = Plan::findOrFail($request->plan_id);

        $stripePriceId = ($request->billing_cycle == 'monthly') ? $plan->stripe_price_id_monthly : $plan->stripe_price_id_yearly;
        if (!$stripePriceId) {
            return response()->json(['error' => 'Stripe Price ID not found for this plan. Please check the plan settings.']);
        }

        if (!$user->stripe_id) {
            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);
            $user->stripe_id = $customer->id;
            $user->save();
        } else {
            $customer = Customer::retrieve($user->stripe_id);
        }

        try {
            $paymentMethod = PaymentMethod::retrieve($request->payment_method);
            $paymentMethod->attach(['customer' => $customer->id]);
            Customer::update($customer->id, [
                'invoice_settings' => ['default_payment_method' => $paymentMethod->id]
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment method error: ' . $e->getMessage()]);
        }

        try {
            $stripeSubscription = StripeSubscription::create([
                'customer' => $customer->id,
                'items' => [['price' => $stripePriceId]],
                'default_payment_method' => $paymentMethod->id,
                'expand' => ['latest_invoice.payment_intent'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create subscription: ' . $e->getMessage()]);
        }

        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'start_date' => Carbon::now()->format('Y-m-d'),
            'end_date' => Carbon::now()->addMonths($request->billing_cycle == 'monthly' ? 1 : 12)->format('Y-m-d'),
            'billing_cycle' => $request->billing_cycle,
            'status' => 'active',
            'stripe_subscription_id' => $stripeSubscription->id
        ]);

        return response()->json(['message' => 'Subscription created successfully!', 'subscription' => $stripeSubscription]);
    }

    public function cancelSubscription(Request $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->where('status', 'active')->first();

        if (!$subscription) {
            return response()->json(['error' => 'No active subscription found']);
        }

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }

        if (!$subscription->stripe_subscription_id) {
            return response()->json(['error' => 'No Stripe subscription ID found.']);
        }

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeSubscription = StripeSubscription::retrieve($subscription->stripe_subscription_id);
            if ($stripeSubscription->status == 'canceled') {
                return response()->json(['error' => 'Subscription is already cancelled.']);
            }

            $cancelType = $request->get('cancel_type', 'immediate');
            if ($cancelType === 'end_of_period') {
                $stripeSubscription->cancel_at_period_end = true;
                $stripeSubscription->save();
            } else {
                $stripeSubscription->cancel();
            }

            $subscription->update([
                'status' => 'cancelled',
                'cancelled_at' => Carbon::now(),
            ]);

            return response()->json([
                'message' => 'Subscription cancelled successfully!',
                'subscription' => $subscription,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to cancel subscription: ' . $e->getMessage()]);
        }
    }

    public function changePlan(Request $request)
    {
        $request->validate([
            'new_plan_id' => 'required|exists:plans,id',
            'billing_cycle' => 'required|in:monthly,yearly',
        ]);

        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->where('status', 'active')->first();

        if (!$subscription) {
            return response()->json(['error' => 'No active subscription found']);
        }

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripeSubscription = StripeSubscription::retrieve($subscription->stripe_subscription_id);
        $newPlan = Plan::findOrFail($request->new_plan_id);
        $stripePriceId = ($request->billing_cycle == 'monthly') ? $newPlan->stripe_price_id_monthly : $newPlan->stripe_price_id_yearly;
        if (!$stripePriceId) {
            return response()->json(['error' => 'Stripe Price ID not found for this plan.']);
        }

        try {
            StripeSubscription::update($stripeSubscription->id, [
                'items' => [
                    [
                        'id' => $stripeSubscription->items->data[0]->id,
                        'price' => $stripePriceId,
                    ]
                ]
            ]);

            $subscription->update([
                'plan_id' => $newPlan->id,
                'billing_cycle' => $request->billing_cycle,
                'status' => 'active',
                'start_date' => Carbon::now()->format('Y-m-d'),
                'end_date' => Carbon::now()->addMonths($request->billing_cycle == 'monthly' ? 1 : 12)->format('Y-m-d'),
            ]);

            return response()->json(['message' => 'Subscription plan updated!', 'subscription' => $subscription]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to change plan: ' . $e->getMessage()]);
        }
    }

    public function resetPlan()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->where('status', 'active')->first();

        if (!$subscription) {
            return response()->json(['error' => 'No active subscription found']);
        }

        if (!$this->checkStripeApiKey()) {
            return response()->json(['error' => 'Invalid Stripe API Key! Please check your configuration.']);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            if ($subscription->stripe_subscription_id) {
                $stripeSubscription = StripeSubscription::retrieve($subscription->stripe_subscription_id);
                $stripeSubscription->cancel();
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to cancel Stripe subscription: ' . $e->getMessage()]);
        }

        $subscription->update([
            'status' => 'expired',
            'end_date' => Carbon::now()->format('Y-m-d'),
        ]);

        return response()->json(['message' => 'Subscription reset successfully!']);
    }

    public function getSubscriptionDetails()
    {
        $subscription = Subscription::where('user_id', Auth::id())->where('status', 'active')->first();
        return response()->json([
            'html' => view('partials.subscription_details', compact('subscription'))->render(),
            'has_subscription' => $subscription ? true : false
        ]);
    }
}
