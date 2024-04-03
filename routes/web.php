<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IntegrasiController;
use App\Http\Controllers\ArtikelController;


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
    return view('landing-page');
});

Route::get('pendaftaran', function (Request $request) {
    if (Auth::check()) {
        return redirect()->intended('home');
    }
    $request->session()->forget('alert');
    return view('pendaftaran');
    // return view('underconstruct');
});

// Route::get('verifikasiOtp/{email}/{id_user}', function ($encryptEmail, $encryptId_user) {
//     $email  = Crypt::decrypt($encryptEmail);
//     Crypt::decrypt($encryptId_user);
//     return view('verifikasiOtp', compact('email', 'id_user'));
// });
Route::get('verifikasiOtp/{email}/{id_user}', [App\Http\Controllers\Auth\RegisterController::class, 'verifikasiOtp']);
// Route::get('verifikasix', function (Request $request) {
//     return view('verifikasiOtp');
//     // return view('underconstruct');
// });



Route::get('kuesioner', [HomeController::class, 'kuesioner']);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');


Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
// Route::post('/register',  [RegisterController::class, 'register']);
Route::get('send-mail', [MailController::class, 'index']);
Route::get('profil', [HomeController::class, 'profil']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/submit-otp', [App\Http\Controllers\Auth\RegisterController::class, 'submitOtp'])->name('submit-otp');
Route::post('/submit-login', [App\Http\Controllers\Auth\LoginController::class, 'submitLogin'])->name('submit-login')->middleware('redirect.get.method');

Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'index'])->name('logout');
Route::post('/submit-profil', [App\Http\Controllers\UserController::class, 'submitProfil'])->name('submit-profil');
Route::post('/update-profil', [App\Http\Controllers\UserController::class, 'updateProfil'])->name('update-profil');
Route::get('/forgot', [App\Http\Controllers\UserController::class, 'forgot'])->name('forgot');
Route::post('/forgot-password', [App\Http\Controllers\UserController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/reset-password/{url}', [App\Http\Controllers\UserController::class, 'doReset']);
Route::post('/resetting', [App\Http\Controllers\UserController::class, 'resetting'])->name('resetting');

Route::get('getKabupaten/{id}', [IntegrasiController::class, 'getKabupaten']);
Route::get('getKecamatan/{id}', [IntegrasiController::class, 'getKecamatan']);
Route::get('getKelurahan/{id}', [IntegrasiController::class, 'getKelurahan']);

// Route::get('/login', 'LoginController@showLoginForm')->name('login');
// Route::post('/login', 'LoginController@login');
// Route::post('/logout', 'LoginController@logout')->name('logout');

// Route::group(['middleware' => 'disable-back-button'],function(){
Route::group(['middleware' => ['auth']], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('/page-materi/{materiid}/sub-materi/{id}', [App\Http\Controllers\MateriFrontController::class, 'viewMateri']);
    Route::get('/dashboard', [App\Http\Controllers\MateriFrontController::class, 'index']);
    Route::get('/lowonganHomeExam/{id}', [App\Http\Controllers\MateriFrontController::class, 'lowonganHomeExam']);
    Route::get('/add-status/{id}', [App\Http\Controllers\MateriFrontController::class, 'addStatus']);
    Route::post('/update-progres-video', [App\Http\Controllers\MateriFrontController::class, 'update_progres_video']);
    Route::post('/update-progres-pdf', [App\Http\Controllers\MateriFrontController::class, 'update_progres_pdf']);
});
Route::post('/add-sub-materi/{id}/{name}', [\App\Http\Controllers\MateriFrontController::class, 'addSubMateri'])->name("add-sub-materi/{id}/{name}");
Route::post('/send-chatting', [\App\Http\Controllers\MateriFrontController::class, 'send_chatting']);
Route::get('/download-pdf/{id}', [\App\Http\Controllers\MateriFrontController::class, 'downloadPdf']);
Route::get('/resend-otp/{email_user}', [App\Http\Controllers\Auth\RegisterController::class, 'resend_otp']);
Route::get('/tes', [App\Http\Controllers\Auth\RegisterController::class, 'tes']);
Route::get('/tesipin', [App\Http\Controllers\Auth\RegisterController::class, 'tesipin']);

Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/detail/{id}', [ArtikelController::class, 'detail']);

// Route::post('/add-sub-materi/{id}/{name}',function(){
//     echo 1;
// });
// });