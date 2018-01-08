<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hocsinh extends Model
{
    //

    protected $table = "HOCSINH";
    protected $primaryKey = "MaHocSinh";
    public $incrementing = false;

    public function Phanlop()
    {
    	# code...
    	return $this->hasMany('App\Phanlop','MaHocSinh','MaHocSinh');
    }
}
