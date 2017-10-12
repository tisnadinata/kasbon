<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peminjaman;
use App\customer;
use App\alamat;
use App\keluarga;
use App\Http\Requests;
use App\kontak;
use App\bank;
use App\pekerjaan;
use DB;
use GuzzleHttp\Client;

class SmsVerifikasiController extends Controller
{
     public function store(Request $request) {
        try {
            $ap_email_address =  $request->input('ap_email_address');
            $principal_amount =  $request->input('principal_amount');
            $biaya_layanan =  $request->input('biaya_layanan');
            $totalPembayaran =  $request->input('totalPembayaran');
            $jatuhTempo =  $request->input('jatuhTempo');
            $duedate =  $request->input('duedate');
            $aff =  $request->input('aff');
            $ap_full_name =  $request->input('ap_full_name');
            //datadiri

             $upjawb                   = new customer();
             $upjawb->nama_lengkap     = $request->ap_full_name;
             $upjawb->email            = $request->ap_email_address;
             $upjawb->password         = '1o823jkago182gukajsdk123';
             $upjawb->jenis_kelamin    = $request->ap_gender;
             $upjawb->tempat_lahir     = $request->ap_pob;
             $upjawb->tanggal_lahir    = $request->ap_dob;
             $upjawb->agama            = $request->ap_religion;
             $upjawb->ras_suku         = $request->ap_race_id;
             $upjawb->pendidikan       = $request->ap_education;
             $upjawb->status_pernikahan= $request->ap_marital_status;
             $upjawb->jumlah_tanggungan= $request->dependents;
             $upjawb->save();

             //get new id_customer
             $id_customer = DB::table('tbl_customer')->select('id_customer')->where('email', $ap_email_address)->get();
             //peminjaman
             $peminjaman                   = new peminjaman();
             foreach ($id_customer as $a)
             $peminjaman->id_customer      = $a->id_customer;
             $peminjaman->referal          = $aff;
             $peminjaman->jumlah_pinjaman  = $request->principal_amount;
             $peminjaman->biaya_layanan    = $request->biaya_layanan;
             $peminjaman->total_peminjaman = $request->totalPembayaran;
             $peminjaman->jatuh_tempo      = $request->jatuhTempo;
             $peminjaman->status_peminjaman= 'pending';
             $peminjaman->save();

             $ap_mobile_prefix =  $request->input('ap_mobile_prefix');
             $ap_mobile_no = $request->input('ap_mobile_no');
             $no_hp = $ap_mobile_prefix.$ap_mobile_no;
             //kontak
             $kontak                = new kontak();
             $kontak->id_customer   = $a->id_customer;
             $kontak->nomor_ktp     = $request->ap_personal_id_no;
             $kontak->nomor_seluler = $no_hp;
             $kontak->nomor_telepon = $request->ap_telp_no;
             $kontak->save();

            //alamat

             $ap_dom_postal_code =  $request->input('ap_dom_postal_code');                
             $id_kota = DB::table('tbl_kota')->select('id_kota')->where('kode_pos', $ap_dom_postal_code)
                                             ->get();
             $alamat                   = new alamat();
             foreach ($id_kota as $b)
             $alamat->id_customer      = $a->id_customer;
             $alamat->nama_alamat      = $request->ap_dom_address;
             $alamat->status_rumah     = $request->ap_home_status2;
             $alamat->id_kota          = $b->id_kota;
             $alamat->save();


            //Fam
            $ap_fam1_postal_code =  $request->input('ap_fam1_postal_code');
            $id_kota_fam = DB::table('tbl_kota')->select('id_kota')->where('kode_pos', $ap_fam1_postal_code)
                                                    ->get();
            foreach ($id_kota_fam as $fam)
             $fam                 = new keluarga();
             $fam->id_customer    = $a->id_customer;
             $fam->nama_keluarga  = $request->ap_fam1_name;
             $fam->nomor_telepon  = $request->ap_telp_fam1;
             $fam->nama_alamat    = $request->ap_fam1_address;
             $fam->id_kota        = $b->id_kota;
             $fam->save();

            //bank
            $ap_bank_name_id  =  $request->input('ap_bank_name_id');
            $ap_bank_number   =  $request->input('ap_bank_number');
            $ap_bank_username =  $request->input('ap_bank_username');

             $bank                   = new bank();
             $bank->id_customer      = $a->id_customer;
             $bank->nama_bank        = $request->ap_bank_name_id;
             $bank->nomor_rekening   = $request->ap_bank_number;
             $bank->atas_nama        = $request->ap_bank_username;
             $bank->save(); 

            //pekerjaan 
             $ap_employer_postal_code =  $request->input('ap_employer_postal_code');  
             $id_kota_emp = DB::table('tbl_kota')->select('id_kota')->where('kode_pos', $ap_employer_postal_code)->get();
             foreach ($id_kota_emp as $c)
             $pekerjaan                   = new pekerjaan();
             $pekerjaan->id_customer      = $a->id_customer;
             $pekerjaan->nama_perusahaan  = $request->ap_employer_name;
             $pekerjaan->nomor_telepon    = $request->ap_telp_work;
             $pekerjaan->nama_alamat      = $request->ap_employer_address;
             $pekerjaan->id_kota          = $c->id_kota;
             $pekerjaan->jenis_pekerjaan  = $request->ap_mrtw_id;
             $pekerjaan->posisi_pekerjaan = $request->ap_employer_role;
             $pekerjaan->penghasilan      = $request->ap_monthly_income;
             $pekerjaan->lama_bekerja     = $request->hll_months_work;
             $pekerjaan->pengeluaran_utama= $request->mainexpenses;
             $pekerjaan->angsuran_kpr     = $request->houseloan;
             $pekerjaan->save(); 

            $sms_otd = intval( "0" .  rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
            $isi_pesan = " Kasbon.com - Kepada Yth. ".$ap_full_name." Berikut Kode Otd ".$sms_otd.". Segera konfirmasi sms otd ini, Terima Kasih."; 
            $this->kirimSms($isi_pesan,$no_hp);
            DB::table('tbl_customer')->insert(['remember_token' => $sms_otd]);
            return view('aplicant-form.sms-verifikasi', compact('ap_email_address','biaya_layanan','principal_amount','totalPembayaran','jatuhTempo'));
        
        } catch (Exception $e) {
            return back()->with('messages',
                array(
                    array('error', $e->getMessage())
                ));

        }
    }
    protected function kirimSms($isi_pesan,$nomor){
            $userkeyanda = 'inxa3r';
            $passkeyanda = 'kasbon123';
            $isipesan = $isi_pesan;
            $nohptujuan = $nomor;
            $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$nohptujuan&pesan=$isi_pesan";
            $url = str_replace(" ","%20",$url);

            $client = new Client();
            $res = $client->request('GET', $url);
            return true;
    }
}
