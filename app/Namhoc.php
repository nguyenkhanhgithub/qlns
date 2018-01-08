<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Namhoc extends Model
{
    //
    protected $table = "NAMHOC";
    protected $primaryKey = "MaNamHoc";
    public $incrementing = false;
    public function Namhoc()
    {
    	# code...
    	return $this->hasMany('App\Lop','MaNamHoc','MaNamHoc');
    }

    public function Phanlop()
    {
    	# code...
    	return $this->hasMany('App\Phanlop','MaNamHoc','MaNamHoc');
    }
}
