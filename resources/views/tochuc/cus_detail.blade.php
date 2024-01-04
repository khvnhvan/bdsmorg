@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NGƯỜI HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br>

        <a href="{{ route('org.cus_info') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br>

        <div style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            <div>
                <div class="update-donator-info">
                    <h1 style="text-align: center;">THÔNG TIN CHI TIẾT NGƯỜI HIẾN MÁU</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <p>Họ tên: {{ $detail->name }}</p>
                            <p>Nhóm máu: {{ $detail->NhomMau }}</p>
                            <p>SĐT: {{ $detail->phone }}</p>
                            <p>Ngày sinh: {{ $detail->birthday }}</p>
                        </div>
                        <div style="width: 45%;">
                            <p>Giới tính: {{ $detail->gender == 1 ? 'Nam' : 'Nữ' }}</p>
                            <p>Nơi cư trú: {{ $detail->address }}</p>
                            <p>Nơi công tác: {{ $detail->workplace }}</p>
                            <p>Email: {{ $detail->email }}</p>
                            <label for="id_num"></label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="donator-reg-history">
                    <h1 style="text-align: center;">LỊCH SỬ CÁC LẦN ĐÃ HIẾU MÁU</h1>
                    <div class="donate-reg-history-content">

                        {{-- @if (($detail->NgayHien = null) and ($detail->LuongMau = null))
                            <p>{{ $detail->name }} chưa hiến máu lần nào!</p>
                        @else
                            @foreach ($detail as $dt)
                                <p>Lần
                                    {{ $stt++ }}:
                                </p>
                                <p>Lượng máu:
                                    {{ $dt->LuongMau }} ml
                                </p>
                                <p>Ngày hiến máu:
                                    {{ $dt->NgayHien }}
                                </p>
                            @endforeach
                        @endif --}}
                    </div>
                </div>
                <div style="width: 0%;"></div>
            </div>
        </div>
    </div>

    <br><br><br>
@stop()
