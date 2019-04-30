<?php

namespace App\Providers;

use Validator;
use App\Admin\Valid\EventValidator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new EventValidator($translator, $data, $rules, $messages);
        });
    }

    public function register()
    {
    }
}
