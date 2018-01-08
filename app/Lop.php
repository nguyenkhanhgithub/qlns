<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Lop extends Eloquent
{
    //
    protected $table = "LOP";
    protected $primaryKey = 'MaLop';
    public $incrementing = false;

    public function Khoilop()
    {
    	# code...
    	return $this->belongsTo('App\Khoilop','MaKhoiLop','MaKhoiLop');
    }

    public function Giaovien()
    {
    	# code...
    	return $this->belongsTo('App\Giaovien','MaGiaoVien','MaGiaoVien');
    }

    public function Namhoc()
    {
    	# code...
    	return $this->belongsTo('App\Namhoc','MaNamHoc','MaNamHoc');
    }

    public function Phanlop()
    {
        # code...
        return $this->hasMany('App\Phanlop','MaLop','MaLop');
    }
}
