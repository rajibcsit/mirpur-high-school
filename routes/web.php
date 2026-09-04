<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ResultController as AdminResultController;
use App\Http\Controllers\Admin\ClassRoutineController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/academics', [HomeController::class, 'academics'])->name('academics');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::get('/notices/{slug}', [NoticeController::class, 'show'])->name('notices.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/results', [ResultController::class, 'index'])->name('results.index');
Route::get('/routine', [RoutineController::class, 'index'])->name('routine.index');

Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');

/*
|--------------------------------------------------------------------------
| Auth Routes (Admin Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes (protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/about', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AdminAboutController::class, 'update'])->name('about.update');
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::resource('students', StudentController::class)->except(['show']);
    Route::resource('results', AdminResultController::class)->only(['index','create','store','destroy']);
    Route::resource('routines', ClassRoutineController::class)->except(['show']);

    Route::resource('notices', AdminNoticeController::class)->except(['show']);
    Route::resource('events', EventController::class)->except(['show']);

    Route::resource('gallery', AdminGalleryController::class)->only(['index', 'create', 'store', 'destroy']);

    Route::resource('teachers', AdminTeacherController::class)->except(['show']);

    Route::get('admissions', [AdminAdmissionController::class, 'index'])->name('admissions.index');
    Route::get('admissions/{admission}', [AdminAdmissionController::class, 'show'])->name('admissions.show');
    Route::patch('admissions/{admission}/status', [AdminAdmissionController::class, 'updateStatus'])->name('admissions.status');
    Route::delete('admissions/{admission}', [AdminAdmissionController::class, 'destroy'])->name('admissions.destroy');

    Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
});
