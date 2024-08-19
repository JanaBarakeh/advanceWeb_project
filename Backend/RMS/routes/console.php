<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('serve:swagger', function () {
    $this->call('l5-swagger:generate');
    $this->call('serve');
})->describe('Serve the application and generate Swagger docs before starting the server');
