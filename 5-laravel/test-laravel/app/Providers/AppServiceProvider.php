<?php

namespace App\Providers;

use App\Models\Skill;
use App\Models\Skill2;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $skills= Skill::get();
        View::share('skills',$skills);

        $skills2= Skill2::get();
        View::share('skills2',$skills2);        
    }
}
