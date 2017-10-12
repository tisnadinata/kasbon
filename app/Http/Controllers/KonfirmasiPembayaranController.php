<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;
use App\Http\Requests;
use Exception;
use Redirect;
use Auth;

class KonfirmasiPembayaranController extends Controller
{
    function store(Request $request){
    
    	 
    	 $upjawb                   = new pembayaran();
	     $upjawb->id_customer	   = Auth::user()->id_customer;
	     $upjawb->nama_bank		   = $request->nama_bank;
	     $upjawb->atas_nama 	   = $request->atas_nama;
	     $upjawb->nomor_rekening   = $request->norek;
	     $upjawb->total_pembayaran = $request->tot_pembayaran;
	     $upjawb->bank_kasbon	   = $request->norek_tujuan;
	     $upjawb->keterangan 	   = $request->keterangan;
	     $upjawb->status_pembayaran= 'pending';
	     $upjawb->save();

	     return redirect::action('MemberController@riwayatpembayaran');

    	
    	
    }
}
