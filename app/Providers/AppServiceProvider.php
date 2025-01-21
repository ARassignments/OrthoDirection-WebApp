<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AdminProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $profileImage = 'assets/images/profile/user-1.jpg'; // Default image
    
            if (Auth::check()) {
                $profile = AdminProfile::where('user_id', Auth::id())->first();
                if ($profile && $profile->profile_img) {
                    $profileImage = asset('profile_images/' . $profile->profile_img);
                }
            }
    
            $view->with('globalProfileImage', $profileImage);
        });
    }
}
