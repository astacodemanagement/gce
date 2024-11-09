<?php

namespace App\Providers;

use App\Models\Chat;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('development')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $profil = Profil::where('id', 1)->first();
        View::share('profil', $profil);

         // Share the count of non-active users with all views
         $nonActiveUserCount = User::where('status', 'Non Aktif')->count();
         View::share('nonActiveUserCount', $nonActiveUserCount);
           // Share the count of unread messages with all views
        $unreadMessagesCount = Chat::where('is_read', 'Belum Dibaca')->count();
        View::share('unreadMessagesCount', $unreadMessagesCount);
    }
}
