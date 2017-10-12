<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    protected $table = 'tbl_customeralamat';
    public function alamat()
    {
        return $this->belongsTo('App\kota','id_kota','id_kota');
    }
}
