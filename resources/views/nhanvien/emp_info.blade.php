@extends('masterview.employee')
@section('empmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN TỔ CHỨC</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
            <h1></h1>
        </div>
        <br><br>
        <label for=""> VIỆN HUYẾT HỌC TRUYỀN MÁU TRUNG ƯƠNG </label>
        <p style="font-size: 12px">Địa chỉ: P. Phạm Văn Bạch, Yên Hoà, Cầu Giấy, Hà Nội</p>
        <p style="font-size: 12px">Fax: (024) 3868 5582 </p>
        <p style="font-size: 12px">Email: vienhhtmtu@nihbt.org.vn</p>
        <br><br>
        @if (Session::has('update'))
            <p>{{ Session::get('update') }}</p>
        @endif
        <br><br>
        <table border="2" style="background-color: #F7E9E8;">
            <tr>
                <th>CCCD - CMT</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Vị trí</th>
                <th>Hành động</th>
            </tr>
            <tr>
                <td>{{ $nhanvien[0]->id }}</td>
                <td>{{ $nhanvien[0]->name }}</td>
                <td>{{ $nhanvien[0]->gender == 1 ? 'Nam' : 'Nữ' }}</td>
                <td>{{ $nhanvien[0]->roles }}</td>
                <td style=" display: flexbox; justify-content: space-around ;">
                    <a href="{{ route('emp.update_emp', $nhanvien[0]->id) }}"><button class="update-btn">Cập
                            nhật</button></a><br><br>
                </td>
            </tr>
        </table>
    </div>
@stop()
