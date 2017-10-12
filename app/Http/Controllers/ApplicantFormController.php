<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class ApplicantFormController extends Controller
{
    public function store(Request $request) {
        try {
            $tab = $request->input('tab');
            if ($tab == '1') {
                $kode_referal = $request->input('ap_brw_reff ');
                $alasan_pinjaman = $request->input('apli_loan_purpose');
                $know_kasbon = $request->input('apli_loan_purpose');
                $ap_email_address =  $request->input('ap_email_address');
                $principal_amount =  $request->input('principal_amount');
                $biaya_layanan =  $request->input('biaya_layanan');
                $totalPembayaran =  $request->input('totalPembayaran');
                $jatuhTempo =  $request->input('jatuhTempo');
                $due_date = $request->input('due_date');
                $aff = $request->input('ap_brw_reff');
            return view('aplicant-form.personal-detail', compact('aff','due_date','kota','kode_referal','alasan_pinjaman','know_kasbon','ap_email_address','biaya_layanan','principal_amount','totalPembayaran','jatuhTempo'));
            
            }

        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));

        }
    }
}
