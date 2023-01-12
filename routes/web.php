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

Route::get('/', [IndexController::class, 'beranda'])->name('beranda');
Route::get('/profil', [IndexController::class, 'profil'])->name('profil');
Route::get('/wbs', [IndexController::class, 'wbs'])->name('wbs');
Route::get('/konsisten', [IndexController::class, 'konsisten'])->name('konsisten');
Route::get('/upg', [IndexController::class, 'upg'])->name('upg');
Route::post('/wbs', [IndexController::class, 'wbsStore'])->name('wbsStore');


Route::get('/documentCategory/{documentCategory}', [IndexController::class, 'documentCategory'])->name('documentCategory');

//ppid
Route::get('/ppidProfile', [IndexController::class, 'ppidProfile'])->name('ppidProfile');
Route::get('/ppidProfileDasarHukum', [IndexController::class, 'ppidProfileDasarHukum'])->name('ppidProfileDasarHukum');
Route::get('/ppidLayananInformasi', [IndexController::class, 'ppidLayananInformasi'])->name('ppidLayananInformasi');
Route::get('/ppidInfoPublic', [IndexController::class, 'ppidInfoPublic'])->name('ppidInfoPublic');
//end of ppid
Route::get('/berita', [IndexController::class, 'berita'])->name('berita');
Route::get('/berita/{berita}', [IndexController::class, 'detailBerita'])->name('detailBerita');
Route::get('/berita/category/{beritaCategory}', [IndexController::class, 'beritaCategory'])->name('beritaCategory');
Route::get('/kegiatan', [IndexController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan/{berita}', [IndexController::class, 'detailKegiatan'])->name('detailKegiatan');
Route::get('/kegiatan/category/{beritaCategory}', [IndexController::class, 'kegiatanCategory'])->name('kegiatanCategory');
Route::get('/kebijakan/{kebijakan}', [IndexController::class, 'kebijakan'])->name('kebijakan');
Route::get('/kebijakan/detailKebijakan/{kebijakan}', [IndexController::class, 'detailKebijakan'])->name('detailKebijakan');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Route::get('/', function () {
    //     return view('backend_layouts.main');
    // })->name('dashboard');
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/storeUserDetail', [DashboardController::class, 'storeUserDetail'])->name('storeUserDetail');
    Route::resource('kebijakan', KebijakanController::class);
    Route::resource('tema', TemaController::class);
    Route::resource('wbsAbout', WbsAboutController::class);
    Route::resource('wbsReport', WbsReportController::class);
    Route::resource('wbsStep', WbsStepController::class);
    Route::resource('wbsBeranda', WbsBerandaController::class);
    Route::resource('kebijakanCategory', KebijakanCategoryController::class);
    Route::resource('mediaLibrary', MediaLibraryController::class);
    Route::resource('kebijakanStatus', KebijakanStatusController::class);
    Route::resource('ppidDasarHukum', PPIDDasarHukumController::class);
    Route::get('ppidDasarHukum/destroyImage/{ppidDasarHukum}', [PPIDDasarHukumController::class, 'destroyImage'])->name('ppidDasarHukum.destroyImage');
    Route::resource('ppidDasarHukumFile', PpidDasarHukumFileController::class);
    Route::resource('ppidInfopublic', PpidInfopublicController::class);
    Route::get('ppidInfopublicFile/destroy/{ppidInfopublicFile}', [PpidInfopublicFileController::class, 'destroy'])->name('ppidInfopublicFile.destroy');
    Route::resource('ppidProfile', PpidProfileController::class);
    Route::get('ppidDasarHukumFile/destroy/{ppidDasarHukumFile}', [PpidDasarHukumFileController::class, 'destroy'])->name('ppidDasarHukumFile.destroy');
    Route::resource('ppidLayananInformasi', PpidLayananInformasiController::class);
    Route::get('ppidLayananInformasi/destroyImage/{ppidLayananInformasi}', [PpidLayananInformasiController::class, 'destroyImage'])->name('ppidLayananInformasi.destroyImage');
    Route::get('ppidLayananInformasi/destroyIcon/{ppidLayananInformasi}', [PpidLayananInformasiController::class, 'destroyIcon'])->name('ppidLayananInformasi.destroyIcon');
    Route::get('ppidLayananInformasiDetail/destroy/{ppidLayananInformasiDetail}', [PpidLayananInformasiDetailController::class, 'destroy'])->name('ppidLayananInformasiDetail.destroy');
    Route::resource('ppidInfopublicSubcategory', PpidInfopublicSubcategoryController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('beranda', BerandaController::class);
    Route::resource('master', MasterController::class);
    Route::resource('wbsCategory', WbsCategoryController::class);
    Route::resource('upgCategory', UpgCategoryController::class);
    Route::resource('konsultasiAsistensiCategory', KonsultasiAsistensiCategoryController::class);
    Route::resource('upgReport', UpgReportController::class);
    Route::resource('upgBeranda', UpgBerandaController::class);
    Route::resource('upgStep', UpgStepController::class);
    Route::resource('pertemuan', PertemuanController::class);
    Route::resource('asistensi', AsistensiController::class);
    Route::resource('konsultasi', KonsultasiController::class);
    Route::resource('permohonanInformasi', PermohonanInformasiController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::get('user/resetPassword/{user}', [UserController::class, 'reset_password'])->name('user.resetPassword');
    Route::resource('link', LinkController::class);
    Route::resource('konsistenBeranda', KonsistenBerandaController::class);
    Route::resource('konsistenStep', KonsistenStepController::class);
    Route::get('link/destroyImage/{link}', [LinkController::class, 'destroyImage'])->name('link.destroyImage');

    Route::resource('documentCategory', DocumentCategoryController::class);
    Route::resource('document', DocumentController::class)->except([
        'destroy'
    ]);
    Route::get('document/destroy/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');

    Route::resource('berita', BeritaController::class);
    Route::get('berita/verifikasi/{berita}', [BeritaController::class, 'verification'])->name('berita.verification');
    Route::resource('beritaCategory', BeritaCategoryController::class);
    Route::get('beritaCategory/destroyLogo/{beritaCategory}', [BeritaCategoryController::class, 'destroyLogo'])->name('beritaCategory.destroyLogo');
    Route::get('beritaCategory/destroyImage/{beritaCategory}', [BeritaCategoryController::class, 'destroyImage'])->name('beritaCategory.destroyImage');
    Route::resource('beritaFile', BeritaFileController::class)->except([
        'destroy'
    ]);
    Route::get('beritaFile/destroy/{beritaFile}', [BeritaFileController::class, 'destroy'])->name('beritaFile.destroy');
    Route::resource('beritaGallery', BeritaGalleryController::class)->except([
        'destroy'
    ]);
    Route::resource('beritaCategoryGallery', BeritaCategoryGalleryController::class)->except([
        'destroy'
    ]);
    Route::get('beritaCategoryGallery/destroy/{beritaCategoryGallery}', [BeritaCategoryGalleryController::class, 'destroy'])->name('beritaCategoryGallery.destroy');
    Route::get('beritaGallery/destroy/{beritaGallery}', [BeritaGalleryController::class, 'destroy'])->name('beritaGallery.destroy');
    Route::resource('beritaSubcategory', BeritaSubcategoryController::class);

    Route::post('upload/image', [UploadController::class, 'storeImage'])->name('upload.storeImage');
    Route::post('upload/file', [UploadController::class, 'storeFile'])->name('upload.storeFile');
    Route::delete('revert/image', [UploadController::class, 'revert'])->name('upload.revert');

    Route::get('wbsReport/exportPdf/{wbsReport}', [WbsReportController::class, 'exportPdf'])->name('wbsReport.exportPdf');
    Route::get('permohonanInformasi/exportPdf/{permohonanInformasi}', [PermohonanInformasiController::class, 'exportPdf'])->name('permohonanInformasi.exportPdf');
    Route::get('upgReport/exportPdf/{upgReport}', [UpgReportController::class, 'exportPdf'])->name('upgReport.exportPdf');
});
require __DIR__ . '/auth.php';
