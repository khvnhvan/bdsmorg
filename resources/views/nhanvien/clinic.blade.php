@extends('masterview.employee')
@section('empmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1>THÔNG TIN NGƯỜI <br>HIẾN MÁU TRONG NGÀY</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br><br><br><br>

        <a href="#"><button class="turn-back-button">QUAY LẠI<I></I></button></a>
        <br><br>
        <h1>THÔNG TIN ĐƠN BỆNH</h1>
        <div class="clinic-info-content">
            <div class="clinic-info-content-left">
                <h4>ĐƠN CỦA NGƯỜI HIẾN</h4>
                <p style="font-size: x-large;">Nguyễn Khánh Vân</p>
            </div>

            <div class="clinic-info-content-right">
                <h4>ĐƠN CỦA BÁC SĨ</h4>
                {{-- <?php if ($count < 1) { ?>
                        <img src="img/Brazuca - Planning.png" alt="" width="80%" height="auto">
                        <p>Không tồn tại đơn khám của bác sĩ</p>
                        <a href="update_clinic_info.php?id_num=<?php echo $id_num; ?>"><button class="view-btn-2" style="font-size: xx-large;">Khám lâm sàng</button></a>
                        <a href="update_info_inday.php?id_num=<?php echo $id_num; ?>"><button class="update-btn" style="font-size: xx-large;">Cập nhật</button></a>
                    <?php } else { ?> --}}
                <p>Ngày khám: 23/12/2023</p>
                <div style="width: 100%; ;display: flex; justify-content: space-between;">
                    <p>Cân nặng: 44 kg</p>
                    <p>Nhiệt độ: 37 °C</p>
                </div>
                <p>Giờ đo lần 1: 15:35 </p>
                <p>Huyết áp: 110 / 120 mmHg </p>
                <p>Mạch: 90 / phút</p>
                <br>
                <p>Giờ đo lần 2: 15:35 </p>
                <p>Huyết áp: 110 / 120 mmHg </p>
                <p>Mạch: 90 / phút</p>
                <p>Hemoglobine: 123 g/dl </p>
                <br>
                <p>Viêm gan siêu vi B: 123 IU/ml </p>
                <br>
                <p>Tình trạng lâm sàng: Khỏe</p>
                <div>
                    <a href="#"><button class="view-btn-2" style="font-size: xx-large;">Xác nhận</button></a> <br><br>
                    <a href="#"><button class="update-btn" style="font-size: xx-large;">Kết luận của bác
                            sĩ</button></a>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
    </div>
@stop()
