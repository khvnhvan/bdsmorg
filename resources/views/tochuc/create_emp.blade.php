@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NHÂN VIÊN</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('org.org_info') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('org.store_emp') }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf
            <div>
                <div class="update-donator-info">
                    <h1>TẠO MỚI THÔNG TIN NHÂN VIÊN</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">CCCD - CMT</label><br>
                            <input type="text" name="id"><br><br>
                            <label for="">Họ tên</label><br>
                            <input type="text" name="name"><br><br>
                            <label for="">Ngày sinh</label><br>
                            <input type="date" name="birthday""><br><br>
                            <label for="gender">Giới tính</label><br>
                            <input type="radio" name="gender" value="1">Nam
                            <input type="radio" name="gender" value="0">Nữ
                            <br> <br>
                        </div>
                        <div style="width: 45%;">
                            <label for="">SĐT</label><br>
                            <input type="text" name="phone"><br><br>
                            <label for="id_num">Địa chỉ</label><br>
                            <input type="text" name="address"><br><br>
                            <label for="">Vị trí</label><br>
                            <input type="radio" name="role" value="1">Nhân viên (Y tá, lễ tân) <br>
                            <input type="radio" name="role" value="2">Bác sĩ <br>
                            <input type="radio" name="role" value="5">Quản lí cung ứng máu
                            <br> <br>
                            <input type="password" name="password" value="123456" hidden>
                        </div>
                    </div>
                    <input type="submit" value="TẠO MỚI" name="submit" class="submit">
                </div>
            </div>
        </form>
        <br><br><br>
    </div>
@stop()
