<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Exception;
use Redirect;

class HistoryPeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'index']);
    }

    public function index() {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('sessions.riwayat-peminjaman');
    }
}
