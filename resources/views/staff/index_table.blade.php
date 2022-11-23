
<div class="table-responsive panel panel-default">
    <table class="table table-bordered has-action">
        <thead>
            <tr>
                <th>Tên Nhân Viên</th>
                <th>Avatar</th>
                <th>Ngày sinh</th>
                <th>Địa Chỉ</th>
                <th>Số Ngày Nghỉ</th>
                <th>Hợp Đồng</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td>{{ $staff->ten }}</td>
                    <td>
                        <img src="upload/{{$staff->avatar}}" class="img-thumbnail" alt="Cinque Terre" width="150" height="100">
                    </td>
                    <td>{{ $staff->ngaysinh }}</td>
                    <td>{{ $staff->diachi }}</td>
                    <td>{{ $staff->songaynghi }}</td>
                    <td>
                        <a href="{{ url('staffs/'.$staff->id.'/contracts') }}" class="btn btn-info btn-sm">Conduct</a>
                    </td>
                    <td>
                        <a href="{{ url('staffs/edit/'.$staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('staffs/'.$staff->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $staffs->links('pagination::bootstrap-4') !!}
<style>

</style>