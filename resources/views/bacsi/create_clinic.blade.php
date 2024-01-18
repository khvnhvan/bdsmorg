@extends('masterview.doctor')
@section('docmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">ĐƠN KHÁM</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br>
        <form action="{{ route('doc.store_clinic', $phieudk[0]->user_id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%;">
            @csrf
            <div class="clinic-info-content">
                <div class="update-donator-info">
                    <h1>ĐƠN KHÁM BÁC SĨ CỦA <p style="color: #DA4239">{{ $phieudk[0]->name }}</p>
                    </h1>
                    <div class="update-donator-info-form">
                        <div class="clinic-info-content-left" style="height: 550px">
                            <input type="text" name="user_id" value="{{ $phieudk[0]->user_id }}" hidden>
                            <input type="text" name="id_phieudangky" value="{{ $phieudk[0]->id }}" hidden>
                            <select name="MaCauTL" hidden>
                                @foreach ($phieutl as $tl)
                                    <option value="{{ $tl->MaCauTL }}"
                                        {{ $phieudk[0]->user_id == $tl->user_id ? 'selected' : '' }}>
                                    </option>
                                @endforeach
                            </select> <br> <br>
                            <label for="">Cân nặng:</label>
                            <input type="text" name="CanNang"> kg
                            <br><br>
                            <label for="">Nhiệt độ: </label>
                            <input type="text" name="NhietDo"> °C <br><br>
                            <label for="">Hemoglobine:</label>
                            <input type="text" name="Hemoglobine"> g/dl <br>
                            <br>
                            <label for="">Viêm gan siêu vi B:</label>
                            <input type="text" name="ViemGanB"> IU/ml <br>
                            <br>
                            <label for="">Tình trạng lâm sàng:</label> <br>
                            <input type="radio" name="TrangThai" value="1"> Đủ điều kiện sức khỏe <br>
                            <input type="radio" name="TrangThai" value="0"> Không đủ điều kiện sức khỏe <br>
                        </div>
                        <div class="clinic-info-content-right" style="height: 500px;"">
                            <label for="">Huyết áp đo lần 1:</label>
                            <input type="text" size="3" name="HuyetAp1"> /120mmHg
                            <br><br>
                            <label for="">Mạch đo lần 1:</label>
                            <input type="text" size="3" name="Mach1"> / phút
                            <br><br>
                            <br><br>
                            <label for="">Huyết áp đo lần 2:</label>
                            <input type="text" size="3" name="HuyetAp2"> /120mmHg
                            <br><br>
                            <label for="">Mạch đo lần 2:</label>
                            <input type="text" size="3" name="Mach2"> / phút
                            <input type="text" name="TrangThaiKham" value="1" hidden>
                        </div>
                    </div>
                    <button type="submit" value="XÁC NHẬN" name="submit" class="submit"> XÁC NHẬN
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
