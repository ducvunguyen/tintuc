<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class PermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    { 
        app()->bind('hello', function(){
           return 'hello';
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('view-post', function($user, $post){
            if ($user->id === $post->user_id) {
                return true;
            }
            return false;
        });
    }
}
