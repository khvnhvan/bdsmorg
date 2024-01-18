@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NGƯỜI HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('org.info_inday') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('org.certificate', $info[0]->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf
            <div>
                <div class="update-donator-info">
                    <h1>GIẤY CHỨNG NHẬN</h1>
                    <p style="font-size: x-large">CCCD - CMT: {{ $info[0]->user_id }}</p>
                    <p style="font-size: x-large">Họ tên: {{ $info[0]->name }}</p>
                    <p style="font-size: x-large">Nhóm máu: {{ $info[0]->NhomMau }}</p>
                    <p style="font-size: x-large">Lượng máu: {{ $info[0]->LuongMau }}</p>
                    <?php $date = date('Y/m/d', time()); ?>
                    <input type="text" value="<?php echo $date; ?>" name="NgayCap" hidden>
                    <input type="text" value="{{ $info[0]->id }}" name="MaDK" hidden>
                    <input type="text" value="1" name="TrangThai" hidden>
                    <input type="submit" value="CẤP GHỨNG NHẬN" name="submit" class="submit">
                </div>
            </div>
        </form>
        <br><br><br>
    </div>
@stop()
