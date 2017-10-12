<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Requests;

class FrontController extends Controller
{
    public function index(Request $request) {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        $aff = $request->get('aff');
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('index',compact('settings','nomor_telepon','alamat','company','aff'));
    }
    public function getkabkota(Request $request) {
        try {
             $return = '<option value="">-- Kota/Kabupaten</option>';
             $get = $request->input('mpa_province');
             $a = DB::table('tbl_kota')->where('provinsi', $get)->distinct()->get(['kota']);
             foreach ($a as $row)
             $return .= "<option value='$row->kota'>$row->kota</option>";
             return $return;

        } catch (Exception $e) {
            return with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }
    public function getkecamatan(Request $request) {
        try {
             $return = '<option value="">-- Kecamatan</option>';
             $get = $request->input('mpa_kab_kot');
             $a = DB::table('tbl_kota')->where('kota', $get)->distinct()->get(['kecamatan']);
             foreach ($a as $row)
             $return .= "<option value='$row->kecamatan'>$row->kecamatan</option>";
             return $return;

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }
    public function getkelurahan(Request $request) {
        try {
             $return = '<option value="">-- Kelurahan</option>';
             $get = $request->input('mpa_kab_kot');
             $get1 = $request->input('mpa_kecamatan');
             $a = DB::table('tbl_kota')->where('kota', $get)
                                               ->where('kecamatan', $get1)
                                               ->distinct()->get(['kelurahan']);
                                               foreach ($a as $row)
             $return .= "<option value='$row->kelurahan'>$row->kelurahan</option>";
             return $return;

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }

    public function getkodepos(Request $request) {
       try {
             $return = "";
             $get = $request->input('mpa_province');
             $get1 = $request->input('mpa_kab_kot');
             $get2 = $request->input('mpa_kecamatan');
             $get3 = $request->input('mpa_kelurahan');
             $a = DB::table('tbl_kota')->where('provinsi', $get)
                                             ->where('kota', $get1)
                                             ->where('kecamatan', $get2)
                                             ->where('kelurahan', $get3)->get();
                                             foreach ($a as $row)
             $return .= "$row->kode_pos";
             return $return;

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));
        }
    }
    public function protips() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('pro-tips',compact('settings','nomor_telepon','alamat','company'));
    }

    public function about() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('about',compact('settings','nomor_telepon','alamat','company'));
    }

    public function police() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('privacy-policy',compact('settings','nomor_telepon','alamat','company'));
    }

    public function term() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('terms-conditions',compact('settings','nomor_telepon','alamat','company'));
    }

    public function fees() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('fees',compact('settings','nomor_telepon','alamat','company'));
    }

    public function work() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('work',compact('settings','nomor_telepon','alamat','company'));
    }

    public function faq() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('faq',compact('settings','nomor_telepon','alamat','company'));
    }
    public function tanggungjawab() {
        if (Auth::check()) {
            return redirect('/home');
        }
        $settings = DB::table('tbl_pengaturan')->where('nama_pengaturan','bunga_pinjaman')->first();
        $nomor_telepon = DB::table('tbl_pengaturan')->where('nama_pengaturan','nomor_telepon')->first();
        $alamat = DB::table('tbl_pengaturan')->where('nama_pengaturan','alamat')->first();
        $company = DB::table('tbl_pengaturan')->where('nama_pengaturan','company')->first();
        return view('tanggung-jawab',compact('settings','nomor_telepon','alamat','company'));
    }
}
