<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\admin\CKEditorController;
use App\Http\Controllers\Admin\FormationsController;
use App\Mail\ResetPasswordMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;

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

// Route::get('locale', [LocalizationController::class, 'getActiveLangue'])->name('getlang');
// Route::get('locale/{lang}', [LocalizationController::class, 'setLangue'])->name('setlang');
Auth::routes();
Route::get('/blog', [BlogController::class, 'getBlog'])->name('blog.index');
Route::resource('formations', App\Http\Controllers\Admin\FormationsController::class);

Route::redirect('/', '/fr');
Route::group(['prefix' => '{langue}'], function () {
    Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('myPathway.connexion');
});


Auth::routes(['register' => false]);
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', function () {
        return view("users.profile");
    })->name('compte');

    Route::any("configure-step", [App\Http\Controllers\Controller::class, 'configureStep'])->name("configure-step");

    Route::middleware(['admin_middleware'])
        ->prefix("admin")
        ->name("admin.")
        ->group(function () {
            
            Route::get('/tableau-bord', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
            Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
            Route::resource('formations', App\Http\Controllers\Admin\FormationsController::class);
            Route::resource('entreprises', App\Http\Controllers\Admin\EntreprisesController::class);
            Route::resource('candidats', App\Http\Controllers\Admin\CandidatsController::class);
            Route::resource('sessions', App\Http\Controllers\Admin\SessionController::class);
            Route::resource('inscriptions', App\Http\Controllers\Admin\InscriptionsController::class);
            Route::resource('session_inscriptions', App\Http\Controllers\Admin\SessionInscriptionsController::class);
            Route::resource('frais', App\Http\Controllers\Admin\FraisInscriptionsController::class);
            Route::get('session/en-cours', [App\Http\Controllers\Admin\SessionsController::class, 'enCours'])->name("sessions.enCours");
            Route::get('session/en-attente', [App\Http\Controllers\Admin\SessionsController::class, 'enAttente'])->name("sessions.enAttente");
            Route::get('session/termines', [App\Http\Controllers\Admin\SessionsController::class, 'termines'])->name("sessions.termines");

        });

    });


