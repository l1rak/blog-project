<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use App\Models\Tag;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view){
            $archives = Post::archives();

            $tags = Tag::has('posts')->pluck('name');

            $view->with(compact('archives','tags'));
        });
    }
}
