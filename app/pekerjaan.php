<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pekerjaan extends Model
{
    protected $table = 'tbl_customerpekerjaan';
    public function alamat()
    {
        return $this->belongsTo('App\kota','id_kota','id_kota');
    }
}
