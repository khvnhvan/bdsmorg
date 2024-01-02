@extends('masterview.organizer')
@section('orgmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1" style="font-size: 300%;">CHỈNH LỊCH</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <a href="{{ route('org.apt_schedule') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>
        <br><br><br>
        <form action="{{ route('org.update_appt_check', $lich->id) }}" method="POST"
            style="background-color: #F7E9E8; padding: 5%; width: 85%;">
            @csrf @method('PUT')
            <div>
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA THÔNG TIN LỊCH</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">Ngày</label><br>
                            <input type="date" class="id_num" name="NgayHien" value="{{ $lich->NgayHien }}"><br><br>
                            <label for="">Tổng lượng máu cần</label><br>
                            <input type="text" name="TongLuongMau" value="{{ $lich->TongLuongMau }}"><br><br>
                            <label for="">Lượng máu đã nhận</label><br>
                            <input type="text" name="LuongMauDaNhan" value="{{ $lich->LuongMauDaNhan }}"><br><br>
                        </div>
                        <div style="width: 45%;">
                            <label for="">Tổng số người cần hiến</label><br>
                            <input type="text" name="SoNguoiCanHien" value="{{ $lich->SoNguoiCanHien }}"><br><br>
                            <label for="">Số người đã đăng ký</label><br>
                            <input type="text" name="SoNguoiDKy" value="{{ $lich->SoNguoiDKy }}"><br><br>
                            <label for=" ">Số người đã hiến</label><br>
                            <input type="text" name="SoNguoiDaHien" value="{{ $lich->SoNguoiDaHien }}"><br><br>
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit">UPDATE

                </div>
            </div>
        </form>
        <br><br><br>
    @stop()
