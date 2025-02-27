<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckSubscriptionExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:check-subscription-expiry';
    protected $signature = 'subscriptions:check-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and expire subscriptions that have passed their end date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredSubscriptions = Subscription::where('end_date', '<', Carbon::now())
            ->where('status', 'active')
            ->whereNull('cancelled_at')
            ->update(['status' => 'expired']);

        $this->info($expiredSubscriptions . ' subscriptions expired.');
    }
}
