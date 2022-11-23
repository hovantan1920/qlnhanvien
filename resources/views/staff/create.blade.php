@extends('layout.master')
@section('content')
    <div class="container">
    <div class="panel-heading">
        <h1>Thêm nhân viên &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{ url('staffs/') }}" class="btn btn-sm btn-primary btn-addon">Back</a></h1>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <form action="{{ url('staffs/create') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ten">Tên Nhân Viên:</label>
                    <input type="text" name="ten" class="form-control" id="ten" required>
                </div>
                <br>
                <div class="form-group">
                    <label class="form-label" for="avatar">Avatar:</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="ngaysinh">Ngày Sinh:</label>
                    <input type="date" name="ngaysinh" class="form-control" id="ngaysinh" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="diachi">Địa Chỉ:</label>
                    <input type="text" name="diachi" class="form-control" id="diachi" required>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection