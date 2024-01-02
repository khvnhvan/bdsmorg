@extends('masterview.doctor')
@section('docmain')


    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NGƯỜI HIẾN MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>

        <a href="{{ route('emp.info_inday') }}"><button class="turn-back-button">QUAY LẠI<I></I></button></a>

        <br><br><br>
        <form action="{{ route('emp.update_infoinday_check', $phieu->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf @method('PUT')
            <div>
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA THÔNG TIN PHIẾU HIẾN MÁU</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">CCCD người hiến máu: {{ $phieu->user_id }}</label><br>
                        </div>
                        <div style="width: 45%;">
                            <label for="">Chấp thuận của bác sĩ:</label><br>
                            <input type="radio" name="Ykienbacsi" value="1"
                                {{ $phieu->Ykienbacsi == 1 ? 'checked' : '' }}>Được hiến
                            <input type="radio" name="Ykienbacsi" value="0"
                                {{ $phieu->Ykienbacsi == 0 ? 'checked' : '' }}>Không được hiến
                            <br><br>
                            <label for="gender">Trạng thái hiến:</label><br>
                            <input type="radio" name="TrangThaiHien" value="1"
                                {{ $phieu->TrangThaiHien == 1 ? 'checked' : '' }}>Đã hiến
                            <input type="radio" name="TrangThaiHien" value="0"
                                {{ $phieu->TrangThaiHien == 0 ? 'checked' : '' }}>Chưa hiến
                            <br><br>
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit"> UPDATE
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
