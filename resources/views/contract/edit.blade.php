@extends('layout.master')
@section('content')
    <div class="container">
        <div class="panel-heading">
            <h1>Sửa Hợp Đồng &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="{{ url('staffs/'.$contract->staff_id.'/contracts') }}" class="btn btn-sm btn-primary btn-addon">Back</a></h1>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ url($contract->staff_id.'/contracts/update/'.$contract->id) }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ngayky">Ngày Ký:</label>
                        <input type="date" name="ngayky" class="form-control" id="ngayky" value="{{$contract->ngayky}}" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="ngayhethang">Ngày Hết Hạn:</label>
                        <input type="date" name="ngayhethang" class="form-control" id="ngayhethang" value="{{$contract->ngayhethang}}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
