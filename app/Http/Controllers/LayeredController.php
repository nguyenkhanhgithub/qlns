<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Phanlop;
use App\Namhoc;
use App\Lop;
use App\Khoilop;
use Session;

class LayeredController extends Controller
{
    //
    public function index(){

    	$namhoc = Namhoc::all();
        $khoilop = Khoilop::all();

        $hocsinh = DB::table('HOCSINH')
            ->whereNotIn('MaHocSinh', function($q){
                $q->select('MaHocSinh')->from('PHANLOP');
            })->get();
        
        return view('Hocsinh.Phanlop.Phanlop',['namhoc' => $namhoc, 'khoilop' => $khoilop, 'hocsinh' => $hocsinh]);
    }

}
