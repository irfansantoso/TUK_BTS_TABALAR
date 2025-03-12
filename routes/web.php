<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
// Route::get('view', function () {
//     return view('view', ['title' => '']);
// })->name('view');
Route::get('/', function () {
    return view('login', ['title' => '']);
})->name('login');
Route::get('login', [UserController::class, 'login_action'])->name('login.action');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('home', [UserController::class, 'home'])->name('home')->middleware('auth');
Route::get('register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('users',[UserController::class, 'users'])->name('users')->middleware('auth');
Route::post('users', [UserController::class, 'users_add'])->name('users.add')->middleware('auth');
Route::get('profile',[UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('profile', [UserController::class, 'profile_edit'])->name('profile.edit')->middleware('auth');
Route::get('lokasi',[UserController::class, 'lokasi'])->name('lokasi')->middleware('auth');
Route::post('lokasi', [UserController::class, 'lokasi_add'])->name('lokasi.add')->middleware('auth');
Route::get('tongkang',[UserController::class, 'tongkang'])->name('tongkang')->middleware('auth');
Route::post('tongkang', [UserController::class, 'tongkang_add'])->name('tongkang.add')->middleware('auth');
Route::get('kayu',[UserController::class, 'kayu'])->name('kayu')->middleware('auth');
Route::post('kayu', [UserController::class, 'kayu_add'])->name('kayu.add')->middleware('auth');
Route::get('driver',[UserController::class, 'driver'])->name('driver')->middleware('auth');
Route::post('driver', [UserController::class, 'driver_add'])->name('driver.add')->middleware('auth');
Route::get('unitAlat',[UserController::class, 'unitAlat'])->name('unitAlat')->middleware('auth');
Route::post('unitAlat', [UserController::class, 'unitAlat_add'])->name('unitAlat.add')->middleware('auth');
Route::get('chainsaw',[UserController::class, 'chainsaw'])->name('chainsaw')->middleware('auth');
Route::post('chainsaw', [UserController::class, 'chainsaw_add'])->name('chainsaw.add')->middleware('auth');
Route::get('kupas',[UserController::class, 'kupas'])->name('kupas')->middleware('auth');
Route::post('kupas', [UserController::class, 'kupas_add'])->name('kupas.add')->middleware('auth');
Route::get('keperluan',[UserController::class, 'keperluan'])->name('keperluan')->middleware('auth');
Route::get('helper',[UserController::class, 'helper'])->name('helper')->middleware('auth');
Route::post('helper', [UserController::class, 'helper_add'])->name('helper.add')->middleware('auth');
Route::post('keperluan', [UserController::class, 'keperluan_add'])->name('keperluan.add')->middleware('auth');
Route::get('trHistory',[UserController::class, 'trHistory'])->name('trHistory')->middleware('auth');
Route::get('trHistory/json', [UserController::class, 'trHistory_data'])->name('trHistory.data')->middleware('auth');
Route::get('periodeOperasional',[UserController::class, 'periodeOperasional'])->name('periodeOperasional')->middleware('auth');
Route::post('periodeOperasional', [UserController::class, 'periodeOperasional_add'])->name('periodeOperasional.add')->middleware('auth');
Route::get('periodeOperasional/{id_periode}', [UserController::class, 'periodeOperasional_actived'])->name('periodeOperasional.actived')->middleware('auth');

// --------- TPN --------------------//
Route::get('trHeaderTpn',[UserController::class, 'trHeaderTpn'])->name('trHeaderTpn')->middleware('auth');
Route::get('trHeaderTpn/json', [UserController::class, 'trHeaderTpn_data'])->name('trHeaderTpn.data')->middleware('auth');
Route::post('trHeaderTpn', [UserController::class, 'trHeaderTpn_add'])->name('trHeaderTpn.add')->middleware('auth');
Route::post('trHeaderTpn/delete/', [UserController::class, 'trHeaderTpnDestroy_del'])->name('trHeaderTpnDestroy.del')->middleware('auth');

Route::get('trDetailTpn/{id_header_tpn_in}', [UserController::class, 'trDetailTpn'])->name('trDetailTpn')->middleware('auth');
Route::post('trDetailTpn', [UserController::class, 'trDetailTpn_add'])->name('trDetailTpn.add')->middleware('auth');
Route::post('trDetailTpn/edit', [UserController::class, 'trDetailTpn_edit'])->name('trDetailTpn.edit')->middleware('auth');
Route::post('trDetailTpn/editforuser', [UserController::class, 'trDetailTpn_editforuser'])->name('trDetailTpn.editforuser')->middleware('auth');
Route::post('trDetailTpn/delete/', [UserController::class, 'trDetailTpn_del'])->name('trDetailTpn.del')->middleware('auth');

Route::get('trHeaderTpnOut',[UserController::class, 'trHeaderTpnOut'])->name('trHeaderTpnOut')->middleware('auth');
Route::get('trHeaderTpnOut/json', [UserController::class, 'trHeaderTpnOut_data'])->name('trHeaderTpnOut.data')->middleware('auth');
Route::post('trHeaderTpnOut', [UserController::class, 'trHeaderTpnOut_add'])->name('trHeaderTpnOut.add')->middleware('auth');
Route::post('trHeaderTpnOut/delete/', [UserController::class, 'trHeaderTpnOutDestroy_del'])->name('trHeaderTpnOutDestroy.del')->middleware('auth');

Route::get('trDetailTpnOut/{id_header_tpn_out}', [UserController::class, 'trDetailTpnOut'])->name('trDetailTpnOut')->middleware('auth');
Route::post('trDetailTpnOut', [UserController::class, 'trDetailTpnOut_add'])->name('trDetailTpnOut.add')->middleware('auth');
Route::post('trDetailTpnOut/delete/', [UserController::class, 'trDetailTpnOut_del'])->name('trDetailTpnOut.del')->middleware('auth');

Route::get('trHeaderTpnOutLogpond',[UserController::class, 'trHeaderTpnOutLogpond'])->name('trHeaderTpnOutLogpond')->middleware('auth');
Route::get('trHeaderTpnOutLogpond/json', [UserController::class, 'trHeaderTpnOutLogpond_data'])->name('trHeaderTpnOutLogpond.data')->middleware('auth');
Route::post('trHeaderTpnOutLogpond', [UserController::class, 'trHeaderTpnOutLogpond_add'])->name('trHeaderTpnOutLogpond.add')->middleware('auth');
Route::post('trHeaderTpnOutLogpond/delete/', [UserController::class, 'trHeaderTpnOutLogpondDestroy_del'])->name('trHeaderTpnOutLogpondDestroy.del')->middleware('auth');

Route::get('trDetailTpnOutLogpond/{id_header_tpn_out}', [UserController::class, 'trDetailTpnOutLogpond'])->name('trDetailTpnOutLogpond')->middleware('auth');
Route::post('trDetailTpnOutLogpond', [UserController::class, 'trDetailTpnOutLogpond_add'])->name('trDetailTpnOutLogpond.add')->middleware('auth');
Route::post('trDetailTpnOutLogpond/delete/', [UserController::class, 'trDetailTpnOutLogpond_del'])->name('trDetailTpnOutLogpond.del')->middleware('auth');

Route::get('trHeaderTpkOutLogpond',[UserController::class, 'trHeaderTpkOutLogpond'])->name('trHeaderTpkOutLogpond')->middleware('auth');
Route::get('trHeaderTpkOutLogpond/json', [UserController::class, 'trHeaderTpkOutLogpond_data'])->name('trHeaderTpkOutLogpond.data')->middleware('auth');
Route::post('trHeaderTpkOutLogpond', [UserController::class, 'trHeaderTpkOutLogpond_add'])->name('trHeaderTpkOutLogpond.add')->middleware('auth');
Route::post('trHeaderTpkOutLogpond/delete/', [UserController::class, 'trHeaderTpkOutLogpondDestroy_del'])->name('trHeaderTpkOutLogpondDestroy.del')->middleware('auth');

Route::get('trDetailTpkOutLogpond/{id_header_tpn_out}', [UserController::class, 'trDetailTpkOutLogpond'])->name('trDetailTpkOutLogpond')->middleware('auth');
Route::post('trDetailTpkOutLogpond', [UserController::class, 'trDetailTpkOutLogpond_add'])->name('trDetailTpkOutLogpond.add')->middleware('auth');
Route::post('trDetailTpkOutLogpond/delete/', [UserController::class, 'trDetailTpkOutLogpond_del'])->name('trDetailTpkOutLogpond.del')->middleware('auth');

Route::get('trHeaderLogpondOutTongkang',[UserController::class, 'trHeaderLogpondOutTongkang'])->name('trHeaderLogpondOutTongkang')->middleware('auth');
Route::get('trHeaderLogpondOutTongkang/json', [UserController::class, 'trHeaderLogpondOutTongkang_data'])->name('trHeaderLogpondOutTongkang.data')->middleware('auth');
Route::post('trHeaderLogpondOutTongkang', [UserController::class, 'trHeaderLogpondOutTongkang_add'])->name('trHeaderLogpondOutTongkang.add')->middleware('auth');
Route::post('trHeaderLogpondOutTongkang/delete/', [UserController::class, 'trHeaderLogpondOutTongkangDestroy_del'])->name('trHeaderLogpondOutTongkangDestroy.del')->middleware('auth');

Route::get('trDetailLogpondOutTongkang/{id_header_tpn_out}', [UserController::class, 'trDetailLogpondOutTongkang'])->name('trDetailLogpondOutTongkang')->middleware('auth');
Route::post('trDetailLogpondOutTongkang', [UserController::class, 'trDetailLogpondOutTongkang_add'])->name('trDetailLogpondOutTongkang.add')->middleware('auth');
Route::post('trDetailLogpondOutTongkang/delete/', [UserController::class, 'trDetailLogpondOutTongkang_del'])->name('trDetailLogpondOutTongkang.del')->middleware('auth');

Route::get('trTongkang',[UserController::class, 'trTongkang'])->name('trTongkang')->middleware('auth');
Route::get('trTongkang/json', [UserController::class, 'trTongkang_data'])->name('trTongkang.data')->middleware('auth');
Route::get('trLoglistModal/json', [UserController::class, 'trLoglistModal_data'])->name('trLoglistModal.data')->middleware('auth');
Route::post('trLoglistModal/edit/', [UserController::class, 'trLoglistModal_edit'])->name('trLoglistModal.edit')->middleware('auth');
Route::get('trLogListTkg/{no_loglist}', [UserController::class, 'trLogListTkg'])->name('trLogListTkg')->middleware('auth');

// ------------------ Reporting --------------------------------//
Route::get('rptStokKayu',[UserController::class, 'rptStokKayu'])->name('rptStokKayu')->middleware('auth');
Route::post('rptStokKayu', [UserController::class, 'rptStokKayu_rpt'])->name('rptStokKayu.rpt')->middleware('auth');

Route::get('rptStokPerThn',[UserController::class, 'rptStokPerThn'])->name('rptStokPerThn')->middleware('auth');
Route::post('rptStokPerThn', [UserController::class, 'rptStokPerThn_rpt'])->name('rptStokPerThn.rpt')->middleware('auth');

Route::get('rptStokPerThnDia',[UserController::class, 'rptStokPerThnDia'])->name('rptStokPerThnDia')->middleware('auth');
Route::post('rptStokPerThnDia', [UserController::class, 'rptStokPerThnDia_rpt'])->name('rptStokPerThnDia.rpt')->middleware('auth');

Route::get('rptChainTrack',[UserController::class, 'rptChainTrack'])->name('rptChainTrack')->middleware('auth');
Route::post('rptChainTrack', [UserController::class, 'rptChainTrack_rpt'])->name('rptChainTrack.rpt')->middleware('auth');

Route::get('rptLoglistLoc',[UserController::class, 'rptLoglistLoc'])->name('rptLoglistLoc')->middleware('auth');
Route::post('rptLoglistLoc', [UserController::class, 'rptLoglistLoc_rpt'])->name('rptLoglistLoc.rpt')->middleware('auth');

Route::get('rptStokLoc',[UserController::class, 'rptStokLoc'])->name('rptStokLoc')->middleware('auth');
Route::post('rptStokLoc', [UserController::class, 'rptStokLoc_rpt'])->name('rptStokLoc.rpt')->middleware('auth');

Route::get('rptStokLocDet',[UserController::class, 'rptStokLocDet'])->name('rptStokLocDet')->middleware('auth');
Route::post('rptStokLocDet', [UserController::class, 'rptStokLocDet_rpt'])->name('rptStokLocDet.rpt')->middleware('auth');

Route::get('rptRekapHauling',[UserController::class, 'rptRekapHauling'])->name('rptRekapHauling')->middleware('auth');
Route::post('rptRekapHauling', [UserController::class, 'rptRekapHauling_rpt'])->name('rptRekapHauling.rpt')->middleware('auth');

Route::get('rptRekapTkg',[UserController::class, 'rptRekapTkg'])->name('rptRekapTkg')->middleware('auth');
Route::post('rptRekapTkg', [UserController::class, 'rptRekapTkg_rpt'])->name('rptRekapTkg.rpt')->middleware('auth');

Route::get('rptRekapPerlokPertahun',[UserController::class, 'rptRekapPerlokPertahun'])->name('rptRekapPerlokPertahun')->middleware('auth');
Route::post('rptRekapPerlokPertahun', [UserController::class, 'rptRekapPerlokPertahun_rpt'])->name('rptRekapPerlokPertahun.rpt')->middleware('auth');

Route::get('rptStokAkhGab',[UserController::class, 'rptStokAkhGab'])->name('rptStokAkhGab')->middleware('auth');
Route::post('rptStokAkhGab', [UserController::class, 'rptStokAkhGab_rpt'])->name('rptStokAkhGab.rpt')->middleware('auth');


Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/{any}',[UserController::class, 'logout']);