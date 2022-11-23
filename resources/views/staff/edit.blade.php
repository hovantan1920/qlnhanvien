@extends('layout.master')
@section('content')
    <div class="container">
        <div class="panel-heading">
            <h1>Sửa thông tin nhân viên &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="{{ url('staffs/') }}" class="btn btn-sm btn-primary btn-addon">Back</a></h1>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ url('staffs/update/'.$staff->id) }}" method="post" enctype="multipart/form-data">
                    <input type="text" hidden name="id" value="{{$staff->id}}">
                    <div class="form-group">
                        <label for="ten">Tên Nhân Viên:</label>
                        <input type="text" name="ten" class="form-control" id="ten" value="{{ $staff->ten }}" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="avatar">Avatar:</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" value="{{ $staff->avatar }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ngaysinh">Ngày Sinh:</label>
                        <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" value="{{ $staff->ngaysinh }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="diachi">Địa Chỉ:</label>
                        <input type="text" name="diachi" class="form-control" id="diachi" value="{{ $staff->diachi }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="songaynghi">Số ngày nghỉ:</label>
                        <input type="number" name="songaynghi" class="form-control" id="songaynghi" value="{{ $staff->songaynghi }}">
                    </div>
                    <br>
                    <button id="submit" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>

        <form action="/sendmail" method="post">
            <input type="hidden" name="id" value="{{ $staff->id }}">
            <input type="submit" value="Send Mail">
        </form>
    </div>
    <script>
        $(function(){
            var str = $("#songaynghi").val();
            $("#submit").click(function(){
                var str2 = $("#songaynghi").val();
                if (str > str2){
                    return false
                }else{
                    return true
                }
            });
        });
    </script>
@endsection
