<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoilop extends Model
{
    //
    protected $table = "KHOILOP";
    protected $primaryKey = 'MaKhoiLop';
    public $incrementing = false;
    
    public function Lop(){
    	return $this->hasMany('App\Lop','MaKhoiLop','MaKhoiLop');
    }
}
