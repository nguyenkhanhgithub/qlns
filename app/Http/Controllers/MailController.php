<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Giaovien;

class MailController extends Controller
{
    //
    public function quantri()
    {
        # code...
        $user = DB::table('users')
            ->where('users.id','!=',Auth::user()->id)
            ->join('LOAINGUOIDUNG','LOAINGUOIDUNG.MaLoai','=','users.permission')
            ->select('users.id','users.name','users.email','LOAINGUOIDUNG.TenLoaiND')
            ->get();
        return view('Mail.Quantri',['user' => $user,'quantri' => $user]);
    }
    
}
