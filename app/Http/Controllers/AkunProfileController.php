<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Redirect;
use App\Http\Requests;

class AkunProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'index']);
    }

    public function index() {
        return view('sessions.akun-profile');
    }
}
