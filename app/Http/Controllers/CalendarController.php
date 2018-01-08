<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Lich;
use App\Sukien;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $lich = Lich::all();
        $sukien = Sukien::all();
        return view('Lichtuan.Lich.Lich',['lich' => $lich, 'sukien' => $sukien]);
    }

    public function postInsert(Request $request)
    {
        # code...
        $sukien = new Sukien;
        $sukien->TenSuKien = $request->TenSuKien;
        $sukien->className = $request->TrangThai;
        $sukien->save();
        return redirect('manage/lich/index')->with('notification','Thêm thành công.');
    }

    public function group()
    {
        # code...
        $sukien = DB::table('EVENTMENT')
            ->paginate(10);
        return view('Lichtuan.Lich.Group',['sukien' => $sukien]);
    }
}
