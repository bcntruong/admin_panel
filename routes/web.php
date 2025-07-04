<?php

use App\Enums\Language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Language switcher route
 * Changes the application locale and redirects back to the previous page
 */
Route::get('/language/{locale}', function ($locale) {
    if (Language::isValid($locale)) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    
    return redirect()->back();
})->name('filament.admin.language');
