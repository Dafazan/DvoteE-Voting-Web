<?php

use App\Http\Controllers\ReportController;
use App\Http\Livewire\Admin\ChangePassword;
use App\Http\Livewire\Admin\Condidate;
use App\Http\Livewire\Admin\Condidatestore;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\GetCandidateVotes;
use App\Http\Livewire\Admin\Login as AdminLogin;
use App\Http\Livewire\Admin\Position;
use App\Http\Livewire\Admin\Setting;
use App\Http\Livewire\Admin\Voter;
use App\Http\Livewire\Admin\GetReport;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Frontend\LogoutPage;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'isvoted'])->group(function () {
    Route::get('/', Home::class)->name('front.home');
    Route::get('/logout', Login::class)->name('front.logout');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', LogoutPage::class)->name('front.logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('front.login');
});

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');
});


// admin routes
Route::middleware(['auth:admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/positions', Position::class)->name('admin.positions');
        Route::get('/condidates', Condidate::class)->name('admin.condidates');
        Route::get('/voters', Voter::class)->name('admin.voters');
        Route::get('/settings', ChangePassword::class)->name('admin.settings');
        // Route::get('/settings', Setting::class)->name('admin.settings');
        Route::get('/change-password', ChangePassword::class)->name('admin.change_password');
        Route::get('/votes', GetCandidateVotes::class)->name('admin.votes');

        Route::get('getreport', [GetReport::class, 'generatepdf'])->name('get.report');
    });
});


Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');
});

// Route::get('/admin/report', ReportController::class)->name('admin.report');
Route::get('/admin/report', [ReportController::class, 'index'])->middleware('auth:admin')->name('admin.report');
Route::get('generatepdf', [ReportController::class, 'generatepdf'])->name('vote.pdf');