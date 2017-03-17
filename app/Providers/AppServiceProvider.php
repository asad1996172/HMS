<?php

namespace App\Providers;
use Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('matches', function($attribute, $value, $parameters, $validator) {

            if (Hash::check($value, $validator->getData()['orignal'])) {
                return true;
            }
            else{
                return false;
            }

        });

        Validator::extend('before_equal', function($attribute, $value, $parameters, $validator) {
            $today = date("Y-m-d");
           // dd($value);
            return strtotime($value) >= strtotime($today);
        });

        Validator::extend('greater_date', function($attribute, $value, $parameters, $validator) {
            $starting = strtotime($validator->getData()['starting_date']);
            $ending = strtotime($validator->getData()['ending_date']);
            return $ending>$starting;
        });


        Validator::extend('nomore', function($attribute, $value, $parameters, $validator) {
           // dd($validator->getData());
            return $validator->getData()['orignal'] >= $validator->getData()['people'];
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
