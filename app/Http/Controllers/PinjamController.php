<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Requests;
use App\pinjam;
use Exception;

class PinjamController extends Controller
{
  
    public function store(Request $request) {
        try {
        $pinjam = DB::table('tbl_customer')->where('email',$request->input('ap_email_address'))->first();
        if ($pinjam !== null){
            return back()->with('messages',
                array(
                    array('error', 'Anda harus menunggu setidaknya 3 bulan untuk melakukan peminjaman dana.')
                ));
        } else {
            $ap_email_address =  $request->input('ap_email_address');
            $principal_amount =  $request->input('principal_amount');
            $biaya_layanan =  $request->input('biaya_layanan');
            $totalPembayaran =  $request->input('totalPembayaran');
            $jatuhTempo =  $request->input('jatuhTempo');            
            $aff =  $request->input('aff');
            $due_date = $request->input('due_date');
            return view('aplicant-form.pengajuan', compact('due_date','aff','ap_email_address','biaya_layanan','principal_amount','totalPembayaran','jatuhTempo'));
        }

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));

        }
    }
}