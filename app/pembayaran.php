<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = "tbl_pembayaran";

    public function bank()
    {
        return $this->belongsTo('App\bank','id_customer','id_customer');
    }
}
