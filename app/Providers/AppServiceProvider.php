<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['conversations.create','conversations.index','conversations.show'],function($view){
            $conversations = auth()->user()->conversations()->orderBy('last_message_at','desc')->get();

            $view->with('conversations',$conversations);
        });
    }
}
