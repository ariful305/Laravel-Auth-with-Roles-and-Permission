<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\DashboardController;


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

//Clear all cache
Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return redirect()->back();
});

Auth::routes();
Route::get('/',function(){
    return view('auth.login');
})->name('home');




Route::group(['as' => 'admin.', 'prefix' => 'admin','middleware' => ['auth', 'permission','web']], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::view('/filemanager','admin.filemanager')->name('filemanager');

    Route::view('/filemanager','admin.filemanager')->name('filemanager');

    Route::resource('roles', RolesController::class);

    Route::resource('permissions', PermissionsController::class);

    //User route
    Route::resource('/user',UserController::class);
    Route::get('user/delete/{id}',[UserController::class, 'destroy'])->name('user.destroy');

    //Profile route
    Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
    Route::post('/profile/update/{id}',[DashboardController::class,'User_update'])->name('profile.update');
  
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth', 'permission','web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


