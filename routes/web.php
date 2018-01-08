<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'UserController@index');
Route::post('postLogin','UserController@postLogin');
Route::get('logout','UserController@getLogout');

Route::group(['prefix' => 'manage','middleware' => 'middleLogin'],function(){
	Route::group(['prefix' => 'home'],function(){
        Route::get('index','HomeController@index');
    });

    Route::group(['prefix' => 'lop'],function(){
    	Route::get('index','ClassController@index');
    	Route::get('getUpdate/{id}','ClassController@getUpdate');
    	Route::post('postUpdate/{id}','ClassController@postUpdate');

    	Route::get('getInsert','ClassController@getInsert');
    	Route::post('postInsert','ClassController@postInsert');

    	Route::get('getDelete/{id}','ClassController@getDelete');
    });

    Route::group(['prefix' => 'khoilop'],function(){
    	Route::get('index','GroupClassController@index');
    	Route::get('getInsert','GroupClassController@getInsert');
    	Route::post('postInsert','GroupClassController@postInsert');

    	Route::get('getUpdate/{id}','GroupClassController@getUpdate');
    	Route::post('postUpdate/{id}','GroupClassController@postUpdate');

    	Route::get('getDelete/{id}','GroupClassController@getDelete');
    });
    
    Route::group(['prefix' => 'mon'],function(){
        Route::get('index','SubjectController@index');
        Route::get('getUpdate/{id}','SubjectController@getUpdate');

        Route::post('postInsert','SubjectController@postInsert');
        Route::post('postUpdate/{id}','SubjectController@postUpdate');

        Route::get('getDelete/{id}','SubjectController@getDelete');
    });

    Route::group(['prefix' => 'diem'],function(){
        Route::get('index','PointsController@index');

        Route::get('getSearch','PointsController@getSearch');

        Route::get('getInsert/{id}','PointsController@getInsert');
        Route::post('postInsert/{id}','PointsController@postInsert');
    });

    Route::group(['prefix' => 'nam'],function(){
        Route::get('index','YearController@index');

        Route::post('postInsert','YearController@postInsert');

        Route::get('getUpdate/{id}','YearController@getUpdate');
        Route::post('postUpdate/{id}','YearController@postUpdate');
        Route::get('getDelete/{id}','YearController@getDelete');
    });

    Route::group(['prefix' => 'hocky'],function(){
       Route::get('index','SemesterController@index');
       Route::get('getUpdate/{id}','SemesterController@getUpdate');
       Route::post('postUpdate/{id}','SemesterController@postUpdate');
       Route::post('postInsert','SemesterController@postInsert');
       Route::get('getDelete/{id}','SemesterController@getDelete');
    });

    Route::group(['prefix' => 'ketqua'],function(){
        Route::get('index','ResultController@index');
        Route::get('getUpdate/{id}','ResultController@getUpdate');
        Route::post('postInsert','ResultController@postInsert');
        Route::post('postUpdate/{id}','ResultController@postUpdate');
        Route::get('getDelete/{id}','ResultController@getDelete');
    });

    Route::group(['prefix' => 'hocluc'],function(){
        Route::get('index','AcadeStrController@index');
        Route::get('getUpdate/{id}','AcadeStrController@getUpdate');
        Route::post('postInsert','AcadeStrController@postInsert');
        Route::post('postUpdate/{id}','AcadeStrController@postUpdate');
        Route::get('getDelete/{id}','AcadeStrController@getDelete');
    });


    Route::group(['prefix' => 'hanhkiem'],function(){
        Route::get('index','ConductController@index');
        Route::get('getUpdate/{id}','ConductController@getUpdate');
        Route::post('postInsert','ConductController@postInsert');
        Route::post('postUpdate/{id}','ConductController@postUpdate');
        Route::get('getDelete/{id}','ConductController@getDelete');
    });

    Route::group(['prefix' => 'hocsinh'],function(){
        Route::get('index','StudentController@index');
        Route::get('getUpdate/{id}','StudentController@getUpdate');
        Route::get('getInsert','StudentController@getInsert');
        Route::post('postInsert','StudentController@postInsert');
        Route::post('postUpdate/{id}','StudentController@postUpdate');
        Route::get('getDelete/{id}','StudentController@getDelete');
    });


    Route::group(['prefix' => 'dantoc'],function(){
        Route::get('index','NationController@index');
        Route::get('getUpdate/{id}','NationController@getUpdate');
        Route::get('getInsert','NationController@getInsert');
        Route::post('postInsert','NationController@postInsert');
        Route::post('postUpdate/{id}','NationController@postUpdate');
        Route::get('getDelete/{id}','NationController@getDelete');
    });


    Route::group(['prefix' => 'tongiao'],function(){
        Route::get('index','ReligionController@index');
        Route::get('getUpdate/{id}','ReligionController@getUpdate');
        Route::get('getInsert','ReligionController@getInsert');
        Route::post('postInsert','ReligionController@postInsert');
        Route::post('postUpdate/{id}','ReligionController@postUpdate');
        Route::get('getDelete/{id}','ReligionController@getDelete');
    });

    Route::group(['prefix' => 'nghenghiep'],function(){
        Route::get('index','JobController@index');
        Route::get('getUpdate/{id}','JobController@getUpdate');
        Route::get('getInsert','JobController@getInsert');
        Route::post('postInsert','JobController@postInsert');
        Route::post('postUpdate/{id}','JobController@postUpdate');
        Route::get('getDelete/{id}','JobController@getDelete');
    });


    Route::group(['prefix' => 'giaovien'],function(){
        Route::get('index','TeacherController@index');
        Route::get('getUpdate/{id}','TeacherController@getUpdate');
        Route::get('getInsert','TeacherController@getInsert');
        Route::post('postInsert','TeacherController@postInsert');
        Route::post('postUpdate/{id}','TeacherController@postUpdate');
        Route::get('getDelete/{id}','TeacherController@getDelete');
    });

    Route::group(['prefix' => 'phancong'],function(){
        Route::get('pcgiaovien/{id}','AssignmentController@pcgiaovien');
    });

    Route::group(['prefix' => 'phanlop'],function(){
        Route::get('index','LayeredController@index');
        Route::post('postInsert','LayeredController@postInsert');
    });

    Route::group(['prefix' => 'lich'],function(){
        Route::get('index','CalendarController@index');
        Route::get('danhsach','CalendarController@group');
        Route::post('postInsert','CalendarController@postInsert');
    });

    Route::group(['prefix' => 'hklh'],function(){
        Route::get('index','TotalPointController@index');
        Route::get('getSearch','TotalPointController@getSearch');
        Route::get('objectpoint','TotalPointController@objectpoint');
    });

    Route::group(['prefix' => 'diemhk'],function(){
        Route::get('index','PointSemesterController@index');
        Route::post('postInsert/{id}','PointSemesterController@postInsert');
    });

    Route::group(['prefix' => 'lichcanbo'],function(){
        Route::get('index','CalTeacherController@index');
    });
    Route::group(['prefix' => 'lichlop'],function(){
        Route::get('index','CalClassController@index');
    });

    Route::group(['prefix' => 'tinnhan'],function(){
        Route::get('quantri','MailController@quantri');
        Route::post('postMailQTV','MailController@postMailQTV');
    });

    Route::group(['prefix' => 'hkmh'],function(){
        Route::get('index','PointSjController@index');
        Route::get('getSearch','PointSjController@getSearch');
    });

    Route::group(['prefix' => 'cnlh'],function(){
        Route::get('index','YearPointController@index');
        Route::get('getSearch','YearPointController@getSearch');
    });

    Route::group(['prefix' => 'sach'],function(){
        Route::get('index','BookController@index');
        Route::get('getSearch','BookController@getSearch');
        Route::post('postInsert','BookController@postInsert'); 
        Route::post('postUpdate','BookController@postUpdate'); 
    });

    Route::group(['prefix' => 'ajax'],function(){
        Route::get('lop_namhoc/{id}','AjaxController@lop_namhoc');
        Route::get('lop_id','AjaxController@lop_id');
        Route::get('hocsinh_lop/{id}','AjaxController@hocsinh_lop');
        Route::post('phanlop_ajax','AjaxController@phanlop_ajax');
        Route::post('phancong_ajax','AjaxController@phancong_ajax');
        Route::post('them_diem','AjaxController@them_diem');
        Route::get('giaovien_daxep','AjaxController@giaovien_daxep');
        Route::get('giaovien_chuaxep','AjaxController@giaovien_chuaxep');
        Route::get('lichtuan','AjaxController@lichtuan');
        Route::post('lich_insert','AjaxController@lich_insert');
        Route::get('delete_event/{id}','Ajaxcontroller@delete_event');
        Route::post('lich_update/{id}','AjaxController@lich_update');
        Route::post('lich_drop/{id}','AjaxController@lich_drop');
        Route::get('lich_id/{id}','AjaxController@lich_id');
        Route::get('lichdisplay','AjaxController@lichdisplay');
        Route::get('hocsinhmon','AjaxController@hocsinhmon');
        Route::get('getMail/{id}','AjaxController@getMail');
        Route::post('sendmailQTV','AjaxController@sendmailQTV');
        Route::get('users','Ajaxcontroller@users');
        Route::get('lichchung','AjaxController@lichchung');
        Route::post('themlich','AjaxController@themlich');
        Route::get('lichsuaid','AjaxController@lichsuaid');
        Route::post('sualichid','AjaxController@sualichid');
        Route::get('xoalichid','AjaxController@xoalichid');
        Route::get('lichlop','AjaxController@lichlop');
        Route::get('mon_id','AjaxController@mon_id');
        Route::get('getBook','AjaxController@getBook');
        Route::get('sach_id','AjaxController@sach_id');
        Route::get('sach_delete','AjaxController@sach_delete');
    });


});
