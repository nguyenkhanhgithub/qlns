<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaovien extends Model
{
    //
    protected $table="GIAOVIEN";
    protected $primaryKey = "MaGiaoVien";
    public $incrementing = false;
    public function Giaovien()
    {
    	# code...
    	return $this->hasMany('App\Lop','MaGiaoVien','MaGiaoVien');
    }
}
