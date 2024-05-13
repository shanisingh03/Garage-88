<?php

use App\Http\Controllers\Frontend\TemplateController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TemplateController::class, 'welcome'])->name('welcome');
Route::get('/about-us', [TemplateController::class, 'aboutUs'])->name('about');
Route::get('/services', [TemplateController::class, 'services'])->name('services');
Route::get('/contact-us', [TemplateController::class, 'contactUs'])->name('contact');
