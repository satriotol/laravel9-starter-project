<?php

use App\Http\Controllers\AsistensiController;
use App\Http\Controllers\BeritaCategoryController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritaSubcategoryController;
use App\Http\Controllers\BeritaGalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KebijakanCategoryController;
use App\Http\Controllers\KebijakanStatusController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\PPIDDasarHukumController;
use App\Http\Controllers\PpidDasarHukumFileController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaCategoryGalleryController;
use App\Http\Controllers\BeritaFileController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentCategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KonsistenBerandaController;
use App\Http\Controllers\KonsistenStepController;
use App\Http\Controllers\KonsultasiAsistensiCategoryController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MediaLibraryController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\PpidLayananInformasiController;
use App\Http\Controllers\PpidLayananInformasiDetailController;
use App\Http\Controllers\PpidInfopublicSubcategoryController;
use App\Http\Controllers\PpidInfopublicController;
use App\Http\Controllers\PpidInfopublicFileController;
use App\Http\Controllers\PpidProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WbsAboutController;
use App\Http\Controllers\WbsBerandaController;
use App\Http\Controllers\WbsStepController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\UpgCategoryController;
use App\Http\Controllers\UpgReportController;
use App\Http\Controllers\UpgBerandaController;
use App\Http\Controllers\UpgStepController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WbsCategoryController;
use App\Http\Controllers\WbsReportController;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\Route;

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

Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('/', function () {
    //     return view('backend_layouts.main');
    // })->name('dashboard');
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::get('user/resetPassword/{user}', [UserController::class, 'reset_password'])->name('user.resetPassword');
});
require __DIR__ . '/auth.php';
