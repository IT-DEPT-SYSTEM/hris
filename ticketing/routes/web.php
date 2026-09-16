<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\TicketController as UserTicketController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | MAIN DASHBOARD
    |--------------------------------------------------------------------------
    |
    | This route is used as the general dashboard entry point.
    | The DashboardController can redirect users based on their role.
    |
    */

    Route::get('/dashboard', function () {

        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    |
    | URL:
    | /admin/...
    |
    | Route names:
    | admin....
    |
    */

    Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | ADMIN DASHBOARD
            |--------------------------------------------------------------------------
            |
            | URL:
            | /admin/dashboard
            |
            | Route:
            | admin.dashboard
            |
            */

            Route::get('/dashboard', [
                AdminDashboardController::class,
                'index'
            ])->name('dashboard');


            /*
            |--------------------------------------------------------------------------
            | CREATE TICKET
            |--------------------------------------------------------------------------
            */

            Route::get('/tickets/create', [
                AdminTicketController::class,
                'create'
            ])->name('tickets.create');


            /*
            |--------------------------------------------------------------------------
            | STORE TICKET
            |--------------------------------------------------------------------------
            */

            Route::post('/tickets', [
                AdminTicketController::class,
                'store'
            ])->name('tickets.store');


            /*
            |--------------------------------------------------------------------------
            | ALL TICKETS
            |--------------------------------------------------------------------------
            */

            Route::get('/tickets', [
                AdminTicketController::class,
                'index'
            ])->name('tickets.index');


            /*
            |--------------------------------------------------------------------------
            | VIEW TICKET
            |--------------------------------------------------------------------------
            */

            Route::get('/tickets/{ticket}', [
                AdminTicketController::class,
                'show'
            ])->name('tickets.show');


            /*
            |--------------------------------------------------------------------------
            | UPDATE TICKET STATUS
            |--------------------------------------------------------------------------
            */

            Route::patch('/tickets/{ticket}/status', [
                AdminTicketController::class,
                'updateStatus'
            ])->name('tickets.updateStatus');


            /*
            |--------------------------------------------------------------------------
            | DELETE TICKET
            |--------------------------------------------------------------------------
            */

            Route::delete('/tickets/{ticket}', [
                AdminTicketController::class,
                'destroy'
            ])->name('tickets.destroy');

        });


    /*
    |--------------------------------------------------------------------------
    | USER ROUTES
    |--------------------------------------------------------------------------
    |
    | URL:
    | /user/...
    |
    | Route names:
    | user....
    |
    */

    Route::prefix('user')
        ->name('user.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | USER DASHBOARD
            |--------------------------------------------------------------------------
            |
            | URL:
            | /user/dashboard
            |
            | Route:
            | user.dashboard
            |
            */

            Route::get('/dashboard', [
                UserDashboardController::class,
                'index'
            ])->name('dashboard');


            /*
            |--------------------------------------------------------------------------
            | USER TICKETS
            |--------------------------------------------------------------------------
            */

            Route::resource(
                'tickets',
                UserTicketController::class
            );

        });

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';