<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phanlop extends Model
{
    //
    protected $table = "PHANLOP";

    public function Phanlop()
    {
        # code...
        return $this->belongsTo('App\Lop','MaLop','MaLop');
    }
}
