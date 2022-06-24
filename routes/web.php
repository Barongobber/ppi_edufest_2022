<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
})->name('usr-home');

Route::get('/pembicara', function () {
    return view('speakers', [
        "title" => "Pembicara",
    ]);
})->name('usr-speaker');

Route::get('/agenda', function () {
    return view('agenda', [
        "title" => "Agenda",
    ]);
})->name('usr-agenda');

Route::get('/acara/{id}', [EventController::class, 'detail'] );

Route::get('/merchandise', function () {
    return view('merchandise', [
        "title" => "Merchandise",
    ]);
})->name('usr-merch');

Route::get('/dokumentasi', function () {
    return view('documentation', [
        "title" => "Docs",
    ]);
})->name('usr-docs');

Route::get('/writing-contest', function () {
    return view('writing-contest/index', [
        "title" => "Writing Contest",
    ]);
})->name('usr-wc');
Route::get('/artikel', function () {
    return view('articles', [
        "title" => "Articles",
    ]);
})->name('usr-articles');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Guest
Route::middleware('guest')->group(function(){
    Route::get('/register', function () {
        return view('admin/register');
    })->name('register');

    Route::get('/login', function () {
        return view('admin/login');
    })->name('login');
});

// Authenticated user with role = db_admin
Route::middleware('auth', 'role:db_admin')->group(function(){
    Route::prefix('/access-list')->group(function(){
        Route::get('/', function () {
            return view('db-admin/index');
        })->name('access-list');
    });
});

// Authenticated user with role = admin
Route::middleware('auth', 'role:admin')->group(function(){
    // Admins
    Route::prefix('/admin')->group(function(){
        Route::get('/', function () {
            return view('admin/dashboard');
        })->name('admin-dashboard');

        // Profile routes
        Route::prefix('/profile')->group(function(){
            Route::get('', function () {
                return view('/admin/profile/index');
            })->name('admin-profile');

            Route::get('/change-password', function () {
                return view('/admin/profile/change-password');
            })->name('admin-profile-change-password');
        });

        // FAQ routes
        Route::prefix('/faqs')->group(function(){
            Route::get('/', function () {
                return view('admin/faqs/index');
            })->name('admin-faqs-index');

            Route::get('/edit/{id}', function () {
                return view('admin/faqs/edit-faq');
            })->name('admin-faq-edit');

            Route::get('/add', function () {
                return view('admin/faqs/add-faq');
            })->name('admin-faq-add');
        });

        // Events routes
        Route::prefix('/events')->group(function(){
            Route::get('/', function () {
                return view('admin/events/index');
            })->name('admin-events-index');

            Route::get('/edit/{id}', function () {
                return view('admin/events/edit-event');
            })->name('admin-event-edit');

            Route::get('/add', function () {
                return view('admin/events/add-event');
            })->name('admin-event-add');
        });

        // Sponsors routes
        Route::prefix('/sponsors')->group(function(){
            Route::get('/', function () {
                return view('admin/sponsors/index');
            })->name('admin-sponsors-index');

            Route::get('/edit/{id}', function () {
                return view('admin/sponsors/edit-sponsor');
            })->name('admin-sponsor-edit');

            Route::get('/add', function () {
                return view('admin/sponsors/add-sponsor');
            })->name('admin-sponsor-add');
        });

        // Partners routes
        Route::prefix('/partners')->group(function(){
            Route::get('/', function () {
                return view('admin/partners/index');
            })->name('admin-partners-index');

            Route::get('/edit/{id}', function () {
                return view('admin/partners/edit-partner');
            })->name('admin-partner-edit');

            Route::get('/add', function () {
                return view('admin/partners/add-partner');
            })->name('admin-partner-add');
        });

        // Speakers routes
        Route::prefix('/speakers')->group(function(){
            Route::get('/', function () {
                return view('admin/speakers/index');
            })->name('admin-speakers-index');

            Route::get('/edit/{id}', function () {
                return view('admin/speakers/edit-speaker');
            })->name('admin-speaker-edit');

            Route::get('/add', function () {
                return view('admin/speakers/add-speaker');
            })->name('admin-speaker-add');
        });

        // Articles routes
        Route::prefix('/articles')->group(function(){
            Route::get('/', function () {
                return view('admin/articles/index');
            })->name('admin-article-index');

            Route::get('/edit/{id}', function () {
                return view('admin/articles/edit-article');
            })->name('admin-article-edit');

            Route::get('/add', function () {
                return view('admin/articles/add-article');
            })->name('admin-article-add');
        });

        // Documentation routes
        Route::prefix('/docs')->group(function(){

            Route::get('/add', function () {
                return view('admin/docs/add-document');
            })->name('admin-docs-add');
        });

        // Reports routes
        Route::prefix('/reports')->group(function(){

            Route::get('/edit/{id}', function () {
                return view('admin/reports/edit-report');
            })->name('admin-report-edit');

            Route::get('/generate/{id}', [ReportController::class, 'generate']);
        });
    });
});
