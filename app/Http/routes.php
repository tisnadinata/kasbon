 <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/' ,['as' => '/', 'uses' => 'FrontController@index']);
    Route::get('/faq', 'FrontController@faq');
    Route::get('/pro-tips', 'FrontController@protips');
    Route::get('/about', 'FrontController@about');
    Route::get('/fees', 'FrontController@fees');
    Route::get('/charter-of-responsible-lending', 'FrontController@tanggungjawab');
    Route::get('/work', 'FrontController@work');
    Route::get('/privacy-policy', 'FrontController@police');
    Route::get('/terms-conditions', 'FrontController@term');
  //  Route::get('/affiliate', 'FrontController@affiliate');
    Route::post('peminjaman-form/pinjam', 'PinjamController@store');
    Route::post('peminjaman-form/pengajuan', 'ApplicantFormController@store');
    Route::post('peminjaman-form/smsverifikasi', 'SmsVerifikasiController@store');
    Route::post('peminjaman-form/get-pinjaman', 'FinalPinjamanController@store');
    Route::post('cek', 'PinjamController@cek');
    Route::post('get/kab-kot', 'FrontController@getkabkota');
    Route::post('get/kecamatan', 'FrontController@getkecamatan');
    Route::post('get/kelurahan', 'FrontController@getkelurahan');
    Route::post('get/kode-pos', 'FrontController@getkodepos');
    Route::auth();
    Route::get('dashboard', 'MemberController@index');
    Route::get('dashboard/akun-profile/data-akun', 'MemberController@akunprofile');
    Route::get('dashboard/history-peminjaman', 'MemberController@riwayat');
    Route::get('dashboard/ajukan-peminjaman', 'MemberController@peminjamanbaru');
    Route::get('dashboard/konfirmasi-pembayaran', 'MemberController@konfirmasipembayaran');
    Route::post('dashboard/konfirmasi-pembayaran', 'KonfirmasiPembayaranController@store');
    Route::get('dashboard/riwayat-pembayaran', 'MemberController@riwayatpembayaran');
    /* MENU IN*/
    Route::get('dashboard/akun-profile/data-pribadi', 'MemberController@datapribadi');
    Route::get('dashboard/akun-profile/data-alamat', 'MemberController@alamat');
    Route::get('dashboard/akun-profile/data-kontak', 'MemberController@datakontak');
    Route::get('dashboard/akun-profile/data-bank', 'MemberController@databank');
    Route::get('dashboard/akun-profile/data-pekerjaan', 'MemberController@datapekerjaan');
    Route::get('dashboard/akun-profile/dokumen-pendukung', 'MemberController@dokumenpendukung');
    Route::post('dashboard/akun-profile/dokumen-pendukung', 'MemberController@store');
    Route::get('dashboard/akun-profile/komisi-detail', 'MemberController@index');
    Route::get('dashboard/akun-profile/cairkan-dana', 'MemberController@index');
});
