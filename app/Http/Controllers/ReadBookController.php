<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\doctruyen;
use Illuminate\Support\Facades\DB;
use App\Sach;
use Response;

class ReadBookController extends Controller
{
    //
    public function index(Request $request)
    {
      # code...
      $doctruyen = DB::table('DOCTRUYEN')
        ->where('MaSach','=',$request->get('id'))
        ->select('*')
        ->orderBy('Chuong','ASC')
        ->paginate(1);
      if ($request->ajax()) {
          return Response::json(View::make('Thuvien.Docsach.ajaxNoidung', array('doctruyen' => $doctruyen))->render());
      }
      return view('Thuvien.DocSach.NoiDung',['doctruyen' => $doctruyen]);
    }
}
