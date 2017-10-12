<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'tbl_peminjaman';
    
    public function bank()
    {
        return $this->belongsTo('App\bank','id_customer','id_customer');
    }
}
