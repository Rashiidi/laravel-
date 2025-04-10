<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

// Other routes...


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user/dashboard', 'User \DashboardController@index')->name('user.dashboard')->middleware('auth');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('events', EventController::class);
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/activity-performance', [ReportsController::class, 'activityPerformance'])->name('reports.activityPerformance');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/welcome');
})->name('logout');



   // Default Laravel user registration routes
   Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
   Route::post('/register', [RegisteredUserController::class, 'store']);
   

// Registration Routes
Route::post('/events/register/{eventId}', [RegistrationController::class, 'register'])
    ->name('events.register')
    ->middleware('auth');


    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/my-registrations', [RegistrationController::class, 'myRegistrations'])->name('my-registrations');
        Route::get('/registrations/{id}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
        Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->name('registrations.update');
        Route::delete('/registrations/{id}', [RegistrationController::class, 'cancel'])->name('cancel-registration');
    });

    Route::get('/about', function () {
        return view('about');
    })->name('about');

// User Section Routes
Route::get('/activities', [EventController::class, 'front'])->name('activities.index');
Route::get('/activities/{id}', [EventController::class, 'show'])->name('activities.show');

Route::get('/showServices', [ServiceController::class, 'showServices'])->name('services.showServices');

// Feedback and Reviews
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Trainer Section Routes


Route::middleware(['auth', 'role:trainer'])->group(function () {
    Route::get('/trainer/dashboard', [TrainerController::class, 'dashboard'])->name('trainer.dashboard');
    Route::get('/trainer/events/{id}/participants', [TrainerController::class, 'participants'])->name('trainer.participants');
    Route::post('/trainer/events/{id}/attendance', [TrainerController::class, 'markAttendance'])->name('trainer.markAttendance');
    Route::get('/trainer/reports', [TrainerController::class, 'reports'])->name('trainer.reports');
});


Route::post('/events/register/{eventId}', [RegistrationController::class, 'register'])
    ->name('events.register')
    ->middleware('auth');



    Route::get('/emails/{id}', function ($id) {
        return response()->json(Email::findOrFail($id));
    });


    Route::get('/admin/send-email', [EmailController::class, 'showForm'])->name('admin.email.form');
    Route::post('/admin/send-email', [EmailController::class, 'sendEmail'])->name('email.send');


    Route::get('/free-trial', [LandingPageController::class, 'freeTrial'])->name('free.trial');
    Route::post('/free-trial', [LandingPageController::class, 'submitTrial'])->name('free.trial.submit');

