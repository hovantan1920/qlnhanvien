@extends('layout.master')
@section('content')
    <div class="container">
    <div class="panel-heading">
        <h1>Thêm hợp đồng &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{ url('staffs/'.$staff->id.'/contracts') }}" class="btn btn-sm btn-primary btn-addon">Back</a></h1>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <form action="{{ url('staffs/'.$staff->id.'/contracts/create') }}" method="post" enctype="multipart/form-data">
            <input type="text" hidden name="staff_id" id="staff_id" value="{{$staff->id}}">
                <div class="form-group">
                    <label for="ngayky">Ngày Ký:</label>
                    <input type="date" name="ngayky" class="form-control" id="ngayky" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="ngayhethang">Ngày Hết Hạn:</label>
                    <input type="date" name="ngayhethang" class="form-control" id="ngayhethang" required>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection