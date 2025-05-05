<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('hello', function() {
    $this->comment('Hello there');
})->purpose('Say hello');

Artisan::command('logs:clear', function () {
    file_put_contents(storage_path('logs/laravel.log'), '');
    $this->info('Laravel log file has been cleared!');
})->purpose('Clear the Laravel log file');