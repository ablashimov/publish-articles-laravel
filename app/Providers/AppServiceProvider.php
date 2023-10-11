<?php

namespace App\Providers;

use App\Services\Payment\Method;
use App\Services\Payment\StubMethod;
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
//        $this->app->bind(\App\Models\Tenant::class, function() {
//            $tenant = app()->make(\DesServices\BaseComponents\Models\Tenant::class);
//
//            return \App\Models\Tenant::find($tenant->id);
//        });
//        return match ($status->value) {
//            Status::ok()->value, Status::skipped()->value => Status::ok(),
//            Status::failed()->value, Status::crashed()->value => Status::failed(),
//            default => Status::warning(),
//        };
        $this->app->bind(Method::class, StubMethod::class);

//        $this->app->bind(SearchPosts::class, function (Application $app) {
//            return new Transistor($app->make(PodcastParser::class));
//        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
