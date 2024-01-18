@extends('masterview.doctor')
@section('docmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">ĐƠN KHÁM</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br>
        <div class="clinic-info-content">
            <div class="update-donator-info">
                <h1>ĐƠN KHÁM BÁC SĨ CỦA <p style="color: #DA4239">{{ $donkham[0]->name }}</p>
                </h1>
                <div class="update-donator-info-form">
                    <div class="clinic-info-content-left" style="height: 550px">
                        <input type="text" name="user_id" value="{{ $donkham[0]->user_id }}" hidden>
                        <select name="MaCauTL" hidden>
                            @foreach ($phieutl as $tl)
                                <option value="{{ $tl->MaCauTL }}"
                                    {{ $donkham[0]->user_id == $tl->user_id ? 'selected' : '' }}>
                                </option>
                            @endforeach
                        </select> <br> <br>
                        <label for="">Cân nặng:</label>
                        <input type="text" name="CanNang" value="{{ $donkham[0]->CanNang }}"> kg
                        <br><br>
                        <label for="">Nhiệt độ: </label>
                        <input type="text" name="NhietDo" value="{{ $donkham[0]->NhietDo }}"> °C <br><br>
                        <label for="">Hemoglobine:</label>
                        <input type="text" name="Hemoglobine" value="{{ $donkham[0]->Hemoglobine }}"> g/dl <br>
                        <br>
                        <label for="">Viêm gan siêu vi B:</label>
                        <input type="text" name="ViemGanB" value="{{ $donkham[0]->ViemGanB }}"> IU/ml <br>
                        <br>
                        <label for="">Tình trạng lâm sàng:</label> <br>
                        <input type="radio" name="TrangThai" value="1"
                            {{ $donkham[0]->TrangThai == 1 ? 'checked' : '' }}> Đủ điều kiện sức khỏe <br>
                        <input type="radio" name="TrangThai" value="0"
                            {{ $donkham[0]->TrangThai == 0 ? 'checked' : '' }}> Không đủ điều kiện sức khỏe <br>
                    </div>
                    <div class="clinic-info-content-right" style="height: 500px;"">
                        <label for="">Giờ đo lần 1:</label>
                        <input type="time" name="Time1" value="{{ $donkham[0]->Time1 }}">
                        <br><br>
                        <label for="">Huyết áp:</label>
                        <input type="text" size="3" name="HuyetAp1" value="{{ $donkham[0]->HuyetAp1 }}"> /120mmHg
                        <br><br>
                        <label for="">Mạch:</label>
                        <input type="text" size="3" name="Mach1" value="{{ $donkham[0]->Mach1 }}"> / phút
                        <br><br>
                        <label for="">Giờ đo lần 2:</label>
                        <input type="time" name="Time2" value="{{ $donkham[0]->Time2 }}">
                        <br><br>
                        <label for="">Huyết áp:</label>
                        <input type="text" size="3" name="HuyetAp2" value="{{ $donkham[0]->HuyetAp2 }}"> /120mmHg
                        <br><br>
                        <label for="">Mạch:</label>
                        <input type="text" size="3" name="Mach2" value="{{ $donkham[0]->Mach2 }}"> / phút
                        <input type="text" name="TrangThaiKham" value="1" hidden>
                    </div>
                </div>
                <button type="submit" value="UPDATE" name="submit" class="submit"> CẬP NHẬT </button>
            </div>
        </div>

        <br><br><br>
    </div>

@stop()
