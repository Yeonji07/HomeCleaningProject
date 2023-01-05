<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeCleaningController;
use App\Http\Controllers\PekerjaController;
use Illuminate\Support\Facades\Session;
use App\Models\Pekerja;
use App\Models\User;

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

// USER PAGE
Route::prefix("user/")->middleware('checkuser')->group(function(){
    Route::get('home',[CustomerController::class,"homepage"]);
    Route::get('order',[CustomerController::class,"loadOrder"]);
    Route::post('order',[CustomerController::class,"order"]);
    Route::get('/order/ajaxDetailPaket/{id}',[CustomerController::class,"ajaxDetailPaket"]);
    Route::get('appointment', [CustomerController::class,"loadAppointment"]);
    Route::post('appointment', [CustomerController::class,"appointment"]);
    Route::get('history', [CustomerController::class,"loadHistoryPemesanan"]);
    Route::get('listpemesanan-user', [CustomerController::class,"loadHistoryAppointment"]);
    Route::post("logout",[CustomerController::class,"logout"]);
    Route::post("getHistory",[CustomerController::class,"getHistoryByDate"]);
    Route::post('appointmentdone', [CustomerController::class,"updateAppointmentUser"]);
    Route::get('/checkout/{id}', [CustomerController::class,"checkoutPage"]);
    Route::post('/purchase', [CustomerController::class,"checkout"]);
    Route::get('/redirect', [CustomerController::class,"redirectorder"]);
    Route::get('/showdetailpekerja',[CustomerController::class,"detailPekerja"]);

    Route::post('/rating1', [CustomerController::class,"rating1"]);
    Route::post('/rating2', [CustomerController::class,"rating2"]);
    Route::post('/rating3', [CustomerController::class,"rating3"]);
    Route::post('/rating4', [CustomerController::class,"rating4"]);
    Route::post('/rating5', [CustomerController::class,"rating5"]);
    Route::post('/mulaipekerjaan', [CustomerController::class,"mulaipekerjaan"]);

});


// ADMIN PAGE
Route::prefix("admin/")->middleware('checkadmin')->group(function(){
    Route::get('home', function () {
        return view("Admin.home");
    });

    Route::get('tambahpekerja', [AdminController::class,"pageTambahPekerja"]);
    Route::get('daftarPekerja', [AdminController::class,"showPekerja"]);

    Route::get('daftarAppointment', [AdminController::class,"showAppointment"]);
    Route::get('daftarTransaksi', [AdminController::class, "showTransaksi"]);

    Route::get('daftarUser',[AdminController::class,"showUser"]);
    Route::get('statistik', [AdminController::class,"showStatistik"]);

    Route::post('/tambahpekerja',[AdminController::class,"tambahPekerja"]);
    Route::post('/deletepekerja',[AdminController::class,"deletePekerja"]);
    Route::post('/confirm-payment',[AdminController::class,"confirmPayment"]);
    Route::post('/reject-payment',[AdminController::class,"rejectPayment"]);
    Route::post('/logout',[AdminController::class,"logout"]);
    Route::post('/detailuser', [AdminController::class,"detailuserpage"]);
    Route::get('/detailuser', [AdminController::class,"detailuserpage"]);
    // Route::get('/chart', [ChartJsController::class,"index"]);
});

// PEKERJA PAGE
Route::prefix("pekerja/")->middleware('checkPekerja')->group(function(){
    Route::get('/home', [PekerjaController::class, "homePekerja"]);
    Route::get('/daftarPekerjaan', [PekerjaController::class, "daftarKerjaPage"]);
    Route::get('/historyPekerjaan', [PekerjaController::class, "historyPage"]);
    Route::get('/editprofile', [PekerjaController::class, "editprofile"]);
    // Route::get('/getSurat', [PekerjaController::class, "getSurat"]);
    Route::post('/getSurat', [PekerjaController::class, "getSurat"]);
    Route::post('/editprofile', [PekerjaController::class, "editprofile"]);
    Route::post('/updateprofile', [PekerjaController::class, "updateprofile"]);
    Route::post('/ubahstatus',[PekerjaController::class,"ubahstatus"]);
    Route::post('/logout',[PekerjaController::class,"logout"]);
    Route::post('/bukti',[PekerjaController::class,"uploadbukti"]);
});

// middleware("checklogin")
Route::get('/', [HomeCleaningController::class, "landingpage"]);
Route::get('/signup', [HomeCleaningController::class, "signupPage"]);

Route::post('/login', [HomeCleaningController::class, "login"]);
Route::get('/login', [HomeCleaningController::class, "loginDirect"])->middleware("checklogin");

Route::post('/signup', [HomeCleaningController::class, "register"]);


//ini route biasa bwt kirim email
Route::get('/verif/{id}', [HomeCleaningController::class, "verif"]);
Route::post('/kirim',[HomeCleaningController::class, "kirimEmail"]);


