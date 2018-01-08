@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-12">
                @if(session('notification'))
                    {{ notifications('info',session('notification')) }}
                @endif
            </div>
        </div>
        <div class="row">                    
            <div class="col-md-3">
                <div class="white-box">
                    <h3 class="box-title">Drag and drop your event</h3>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="calendar-events" class="m-t-20">
                                @foreach($sukien as $sk)
                                    <div class="calendar-events" data-class="{{$sk->className}}" data-value="{{$sk->id}}"><i class="fa fa-circle text-{{substr($sk->className,3)}}"></i>{{$sk->TenSuKien}}</div>
                                @endforeach
                            </div>
                            <!-- checkbox -->
                            <div class="checkbox">
                                <input id="drop-remove" type="checkbox">
                                <label for="drop-remove">
                                    Remove after drop
                                </label>
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#add-new-event" class="btn btn-lg m-t-40 btn-danger btn-block waves-effect waves-light">
                                <i class="ti-plus"></i> Add New Event
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="col-md-9">
            <div class="white-box">
                    <div id="calendar"></div>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <form action="manage/ajax/lich_insert" method="post">
                <input type="hidden" name="_token" value="{{csrf_Token()}}">
                <div class="modal fade none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect closemodal" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light save-event" value="save" id="save">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal Add Category -->
            <div class="modal fade none-border" id="add-new-event">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Add</strong> a category</h4>
                        </div>
                        <form method="post" action="manage/lich/postInsert">
                            <input type="hidden" name="_token" value="{{csrf_Token()}}">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Category Name</label>
                                        <input class="form-control form-white" placeholder="Enter name" type="text" name="TenSuKien" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Choose Category Color</label>
                                        <select class="form-control form-white" data-placeholder="Choose a color..." name="TrangThai">
                                            <option value="bg-success">Success</option>
                                            <option value="bg-danger">Danger</option>
                                            <option value="bg-info">Info</option>
                                            <option value="bg-primary">Primary</option>
                                            <option value="bg-warning">Warning</option>
                                            <option value="bg-inverse">Inverse</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-danger waves-effect waves-light">Save</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->
        </div>
    </div>
</div>

@endsection
@section('style')
<style>
.fc-toolbar{
    background:#6ebfe2;
}
.fc th.fc-widget-header{
    padding: 5px;
}
.clockpicker-popover {
    z-index: 1600 !important; /* has to be larger than 1050 */
}
</style>
@endsection
@section('script')
<script>
    $('.closemodal').click(function(){
        $('.capnhat').css('display','none');
    });
</script>
@endsection