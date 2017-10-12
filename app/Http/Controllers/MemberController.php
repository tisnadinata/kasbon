<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Exception;
use Redirect;
use App\pekerjaan;
use App\peminjaman;
use App\pembayaran;
use App\alamat;
use DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\dokumen;

class MemberController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth', ['only'=>'index']);
    }

    public function index() {
        return view('sessions.index');
    }
    public function akunprofile() {
        try {
             $cust = DB::table('tbl_customer')->where('email', Auth::user()->email)->get();
             return view('sessions.akun-profile', compact('cust'));
        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }

    public function history() {
        return view('sessions.riwayat-peminjaman');
    }

    public function peminjamanbaru() {
        return view('sessions.ajukan-peminjaman');
    }

    public function datapribadi() {
             $cust = DB::table('tbl_customer')->where('id_customer', Auth::user()->id_customer)->get();
             return view('sessions.data-pribadi', compact('cust'));
    }

    public function alamat() {
             $cust = alamat::where('id_customer', Auth::user()->id_customer)->get();
             return view('sessions.data-alamat', compact('cust'));
    }

    public function datakontak() {
            $cust = DB::table('tbl_customerkontak')->where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.data-kontak', compact('cust'));
    }

    public function databank() {
        $cust = DB::table('tbl_bank')->where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.data-bank', compact('cust'));
    }

    public function datapekerjaan() {
        $cust = pekerjaan::where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.data-pekerjaan', compact('cust'));
    }

    public function dokumenpendukung() {
        $cust = DB::table('tbl_customerdokumen')->where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.dokumen-pendukung', compact('cust'));
    }

    public function riwayat() {
        $cust = DB::table('tbl_peminjaman')->where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.riwayat-peminjaman', compact('cust'));
    }

    public function riwayatpembayaran() {
        $cust = pembayaran::where('id_customer', Auth::user()->id_customer)->get();
        return view('sessions.riwayat-pembayaran', compact('cust'));
    }

    public function konfirmasipembayaran() {
        $cust = peminjaman::where('id_customer', Auth::user()->id_customer)->get();
        $rek_kasbon = DB::table('tbl_bank')->where('id_customer', '0')->get();
        return view('sessions.konfirmasi-pembayaran', compact('cust','rek_kasbon'));
    }

    public function store(Request $request) {
        try{
        $this->validate($request, [
            'file_ktp' => 'mimes:jpeg,png|max:2048',
            // not using `image` rule, as that will allow svg
            'file_kk' => 'mimes:jpeg,png|max:2048'
        ]);

        if ($request->hasFile('file_ktp')) {
            $data['file_ktp'] = $this->savePhoto($request->file('file_ktp'));
            // I'm not deleting old photo, as stub image file is used by multiple product.
        }

        if ($request->hasFile('file_kk')) {
            $data['file_kk'] = $this->savePhoto($request->file('file_kk'));
            // I'm not deleting old photo, as stub image file is used by multiple product.
        }

         $upjawb                = new dokumen();
         $upjawb->id_customer   = Auth::user()->id_customer;
         $upjawb->file_ktp      = $data['file_ktp'];
         $upjawb->file_kk       = $data['file_kk'];
         $upjawb->save();
        return redirect::action('MemberController@dokumenpendukung');

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }
     protected function savePhoto(UploadedFile $photo)
    {
        $fileName = str_random(40) . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }
}
