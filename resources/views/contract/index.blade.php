@extends('layout.master')
@section('content')
    <div class="panel-heading">
        <h1>Quản lý hợp đồng</h1>
    </div>
    <br>
    <div class="panel-default">
        <div class="panel-heading">
            <a href="{{ url('staffs/'.$staff->id.'/contracts/create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i> Create</a>
            <a href="{{ url('staffs/') }}" class="btn btn-sm btn-primary btn-addon">Back</a></h1>
        </div>
        <br>
        <div id="table_contract">
            <div class="table-responsive panel panel-default">
                <table class="table table-bordered has-action">
                    <thead>
                        <tr>
                            <th>Hợp Đồng Số</th>
                            <th>Ngày Ký</th>
                            <th>Ngày Hết Hạn</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contract->ngayky }}</td>
                                <td>{{ $contract->ngayhethang }}</td>
                                <td>
                                    <a href="{{ url('contracts/edit/'.$contract->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ url($staff->id.'/contracts/'.$contract->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
