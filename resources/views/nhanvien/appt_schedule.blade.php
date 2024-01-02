@extends('masterview.doctor')
@section('docmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1" style="font-size: 300%;">LỊCH HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <table style="background-color: #F7E9E8;">
            <tr>
                <th>Ngày</th>
                <th>Tổng lượng máu cần</th>
                <th>Lượng máu đã nhận</th>
                <th>Tổng số người cần hiến</th>
                <th>Số người đã đăng ký</th>
                <th>Số người đã hiến</th>
            </tr>
            @foreach ($appointment as $appt)
                <tr>
                    <td>{{ $appt->NgayHien }}</td>
                    <td>{{ $appt->SoNguoiCanHien }}</td>
                    <td>{{ $appt->SoNguoiDKy }}</td>
                    <td>{{ $appt->SoNguoiDaHien }}</td>
                    <td>{{ $appt->TongLuongMau }}</td>
                    <td>{{ $appt->LuongMauDaNhan }}</td>
                </tr>
            @endforeach
        </table>
        <br><br><br>
    @stop()
