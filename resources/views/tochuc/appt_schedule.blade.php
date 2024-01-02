@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1" style="font-size: 300%;">CHỈNH LỊCH</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        @if (Session::has('success'))
            <p style="color: green;">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('update'))
            <p style="color: green;">{{ Session::get('update') }}</p>
        @endif
        <table style="background-color: #F7E9E8;">
            <tr>
                <th>Ngày</th>
                <th>Tổng lượng máu cần</th>
                <th>Lượng máu đã nhận</th>
                <th>Tổng số người cần hiến</th>
                <th>Số người đã đăng ký</th>
                <th>Số người đã hiến</th>
                <th>Hành động</th>
            </tr>
            @foreach ($appointment as $appt)
                <tr>
                    <td>{{ $appt->NgayHien }}</td>
                    <td>{{ $appt->SoNguoiCanHien }}</td>
                    <td>{{ $appt->SoNguoiDKy }}</td>
                    <td>{{ $appt->SoNguoiDaHien }}</td>
                    <td>{{ $appt->TongLuongMau }}</td>
                    <td>{{ $appt->LuongMauDaNhan }}</td>
                    <td>
                        <a href="{{ route('org.update_appt', $appt->id) }}"><button class="update-btn">Sửa</button></a>
                        <form action="{{ route('org.delete_appt', $appt->id) }}" method="POST">
                            @method('DELETE') @csrf
                            <button class="delete-btn">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br><br><br>
    @stop()
