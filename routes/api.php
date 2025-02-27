<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;
use Illuminate\Support\Facades\Route;

Route::post('/stripe/webhook', function (Request $request) {
    $payload = $request->all();
    Log::info('Stripe Webhook:', $payload);

    if ($payload['type'] === 'customer.subscription.deleted') {
        $subscription = Subscription::where('stripe_subscription_id', $payload['data']['object']['id'])->first();
        if ($subscription) {
            $subscription->update(['status' => 'expired']);
        }
    }

    return response()->json(['status' => 'success']);
});