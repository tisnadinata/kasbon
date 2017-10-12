<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class FinalPinjamanController extends Controller
{
    public function store(Request $request) {
        try {   
            
            $otd = $request->input('mobile_code');
            $ap_email_address =  $request->input('ap_email_address');
            $principal_amount =  $request->input('principal_amount');
            $biaya_layanan =  $request->input('biaya_layanan');
            $totalPembayaran =  $request->input('totalPembayaran');
            $jatuhTempo =  $request->input('jatuhTempo');
            $cek_sms_otd = DB::table('tbl_customer')->where('remember_token', $otd)->where('email', $ap_email_address)->count();
            if ($cek_sms_otd == '0'){
                 return back()->with('messages',
                array(
                    array('error', 'Kode SMS Anda Salah')
                ));
            } else {
         
            return view('aplicant-form.get-pinjaman',compact('ap_email_address'));
            
            }

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));

        }
    }

}
