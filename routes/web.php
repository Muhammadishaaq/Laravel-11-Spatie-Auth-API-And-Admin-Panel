<?php
use Illuminate\Support\Facades\Route;
use App\Enums\UserRoleEnums;
use App\Http\Controllers\Admin\Auth\{
    LoginController,

};
use App\Http\Controllers\Admin\{
    DashboardController,

};


/* admin login  */
Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.loginPage');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

});


Route::get('/create-link', function () {
    $storagePath = public_path('storage');
    if (file_exists($storagePath)) {
        unlink($storagePath);
    }
    symlink(storage_path('/app/public'), $storagePath);
    return 'Symlink has been created';
});



Route::get('/db', function () {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return "seed";
});