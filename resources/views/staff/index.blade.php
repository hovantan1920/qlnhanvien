@extends('layout.master')
@section('content')
    <div class="panel-heading">
        <h1>Quản lý thông tin nhân viên</h1>
    </div>
    <br>
    <div class="panel-default">
        <div class="panel-heading">
            <a href="{{ url('staffs/create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </div>
        <br>
        <div id="table_staff">
        @include('staff.index_table')
        </div>
    </div>
    <script>
        $(document).ready(function(){

        $(document).on('click', '.page-link', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            fetch_staff(page);
        });

        function fetch_staff(page)
        {
            $.ajax({
                url:"/staffs/fetch_staff?page="+page,
                success:function(staff){
                    $('#table_staff').html(staff);
                }
            });
        }
        });
    </script>
@endsection
