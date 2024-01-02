@extends('masterview.organizer')
@section('orgmain')


    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1" style="font-size: 300%;">TẠO LỊCH</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br><br>
        @if (Session::has('error'))
            <p style="color: red;">{{ Session::get('error') }}</p>
        @endif
        <div class="create-booking">
            <form action="{{ route('org.create_appt_check') }}" method="POST" style="padding-left: 5%;">
                @csrf
                <p>Chọn khoảng ngày cần tạo lịch (Tối đa 1 tuần)</p>
                <div style="display: flex; width: 100%; justify-content: space-between;">
                    <div style="width: 45%;">
                        <label for="start_date">Nhập ngày bắt đầu:</label> <br>
                        <input type="date" name="start_date" id="start_date"
                            style="font-size: xx-large; color: #414A5D; ;">
                    </div>
                    <div style="width: 45%;">
                        <label for="end_date">Nhập ngày kết thúc:</label> <br>
                        <input type="date" name="end_date" id="end_date" style="font-size: xx-large; color: #414A5D;">
                    </div>
                </div>
                <br>
                <label for="">Nhập số lượng máu cần tiếp nhận đủ mỗi ngày(Daily goal) - Đơn vị ml: </label>
                <input type="number" value="7000" name="TongLuongMau" style="font-size: xx-large;"><br><br>
                <button type="submit" name="submit" value="TẠO LỊCH" class="turn-back-button">TẠO LỊCH
            </form>
        </div>
        <br><br><br><br>
    </div>
@stop()
