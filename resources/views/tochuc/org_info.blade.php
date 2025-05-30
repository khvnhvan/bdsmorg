@extends('masterview.organizer')
@section('orgmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>TỔ CHỨC</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>

        <div style="width: 89%; height: auto; background-color: #F7E9E8; padding: 50px">
            <p style="font-size: x-large"> VIỆN
                HUYẾT HỌC TRUYỀN MÁU TRUNG ƯƠNG </p>
            <p style="font-size: 12px">Địa chỉ: P. Phạm Văn Bạch, Yên Hoà, Cầu Giấy, Hà Nội</p>
            <p style="font-size: 12px">Fax: (024) 3868 5582 </p>
            <p style="font-size: 12px">Email: vienhhtmtu@nihbt.org.vn</p>
            <br><br>
            <form action="" style="font-size: x-large;" method="GET">
                <label for="">Tìm kiếm theo CCCD: </label>
                <input name="key" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
                <input type="submit" value="Tìm kiếm"
                    style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            </form> <br>
            <form action="" style="font-size: x-large;" method="GET">
                <label for="">Tìm kiếm theo tên: </label>
                <input name="name" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
                <input type="submit" value="Tìm kiếm"
                    style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            </form>
            <br>
            <a href="{{ route('org.create_emp') }}"><button class="update-btn">Thêm mới</button></a><br> <br>
            @if (Session::has('success'))
                <p style="color: red">{{ Session::get('success') }}</p>
            @endif
            @if (Session::has('update'))
                <p style="color: red">{{ Session::get('update') }}</p>
            @endif
            {{-- @if (Session::has('delete'))
                <p>{{ Session::get('delete') }}</p>
            @endif --}}
            <br>
            <table border="2" style="background-color: #F7E9E8;">
                <tr>
                    <th>CCCD - CMT</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>SĐT</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Chức vụ</th>
                    <th>Hành động</th>
                </tr>
                @foreach ($employee as $emp)
                    <tr>

                        <td>{{ $emp->id }}</td>
                        <td>{{ $emp->name }}</td>
                        <td>{{ $emp->gender == 0 ? 'Nữ' : 'Nam' }}</td>
                        <td>{{ $emp->phone }}</td>
                        <td>{{ $emp->birthday }}</td>
                        <td>{{ $emp->address }}</td>
                        <td>{{ $emp->roles }}</td>
                        <td style=" display: flex;">
                            <a href="{{ route('org.update_emp', $emp->id) }}"><button class="update-btn">Cập
                                    nhật</button></a><br><br>
                            <div style="width: 5px"></div>
                            <form action="{{ route('org.delete_emp', $emp->id) }}" method="POST">
                                @method('DELETE') @csrf
                                <button onclick="confirmDelete()" class="delete-btn">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop()
