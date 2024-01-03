@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">ĐƠN KHÁM</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br>
        <form action="{{ route('org.update_clinic', $cl[0]->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf @method('PUT')
            <div class="clinic-info-content">
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA ĐƠN KHÁM BÁC SĨ</h1>
                    <div class="update-donator-info-form">
                        <div class="clinic-info-content-left" style="height: 550px">
                            <label for="">Cân nặng:</label>
                            <input type="text" name="CanNang" value="{{ $cl[0]->CanNang }}"> kg
                            <br><br>
                            <label for="">Nhiệt độ: </label>
                            <input type="text" name="NhietDo" value="{{ $cl[0]->NhietDo }}"> °C <br><br>
                            <label for="">Hemoglobine:</label>
                            <input type="text" name="Hemoglobine" value="{{ $cl[0]->Hemoglobine }}"> g/dl <br>
                            <br>
                            <label for="">Viêm gan siêu vi B:</label>
                            <input type="text" name="ViemGanB" value="{{ $cl[0]->ViemGanB }}"> IU/ml <br>
                            <br>
                            <label for="">Tình trạng lâm sàng:</label> <br>
                            <input type="radio" name="TrangThai" value="1"
                                {{ $cl[0]->TrangThai == 1 ? 'checked' : ' ' }}> Đủ điều kiện sức khỏe <br>
                            <input type="radio" name="TrangThai" value="0"
                                {{ $cl[0]->TrangThai == 0 ? 'checked' : ' ' }}> Không đủ điều kiện sức khỏe <br>
                        </div>
                        <div class="clinic-info-content-right" style="height: 500px;"">
                            <label for="">Giờ đo lần 1:</label>
                            <input type="datetime" name="Time1" value="{{ $cl[0]->Time1 }}">
                            <br><br>
                            <label for="">Huyết áp:</label>
                            <input type="text" size="3" name="HuyetAp1" value="{{ $cl[0]->HuyetAp1 }}">/120mmHg
                            <br><br>
                            <label for="">Mạch:</label>
                            <input type="text" size="3" name="Mach1" value="{{ $cl[0]->Mach1 }}"> / phút
                            <br><br>
                            <label for="">Giờ đo lần 2:</label>
                            <input type="datetime" name="Time2" value="{{ $cl[0]->Time2 }}">
                            <br><br>
                            <label for="">Huyết áp:</label>
                            <input type="text" size="3" name="HuyetAp2" value="{{ $cl[0]->HuyetAp2 }}">/120mmHg
                            <br><br>
                            <label for="">Mạch:</label>
                            <input type="text" size="3" name="Mach2" value="{{ $cl[0]->Mach2 }}"> / phút
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit"> UPDATE
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
