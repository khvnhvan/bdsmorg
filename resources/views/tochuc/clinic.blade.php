@extends('masterview.organizer')
@section('orgmain')
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

                <h4>{{ $question[0]->content }}</h4>
                <p>{{ implode('', json_decode($answer[0]->q1)) }}</p>
                <hr>
                <h4>{{ $question[1]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q2)); ?></p>
                <hr>
                <h4>{{ $question[2]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q3)); ?></p>
                <hr>
                <h4>{{ $question[3]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q4)); ?></p>
                <hr>
                <h4>{{ $question[4]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q5)); ?></p>
                <hr>
                <h4>{{ $question[5]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q6)); ?></p>
                <hr>
                <h4>{{ $question[6]->content }}</h4>
                <p><?php
                if ($answer[0]->q7 == 'null') {
                    echo ' ';
                } else {
                    echo '-' . implode('<br>-', json_decode($answer[0]->q7));
                }
                ?></p>
                <hr>
                <h4>{{ $question[7]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q8)); ?></p>
                <hr>
                <h4>{{ $question[8]->content }}</h4>
                <p><?php echo '-' . implode('<br>-', json_decode($answer[0]->q9)); ?></p>
            </div>

            <div class="clinic-info-content-right">
                <h4>ĐƠN CỦA BÁC SĨ</h4>
                <hr>
                <div style="width: 100%; ;display: flex; justify-content: space-between;">
                    <p>Cân nặng: {{ $clinic->CanNang }} kg</p>
                    <p>Nhiệt độ: {{ $clinic->NhietDo }} °C</p>
                </div>
                <p>Giờ đo lần 1: {{ $clinic->Time1 }} </p>
                <p>Huyết áp: {{ $clinic->HuyetAp1 }} / 120 mmHg </p>
                <p>Mạch: {{ $clinic->Mach1 }} / phút</p>
                <br>
                <p>Giờ đo lần 2: {{ $clinic->Time2 }} </p>
                <p>Huyết áp: {{ $clinic->HuyetAp2 }} / 120 mmHg </p>
                <p>Mạch: {{ $clinic->Mach2 }} / phút</p>
                <p>Hemoglobine: {{ $clinic->Hemoglobine }} g/dl </p>
                <br>
                <p>Viêm gan siêu vi B: {{ $clinic->ViemGanB }} IU/ml </p>
                <br>
                <p>Tình trạng lâm sàng: {{ $clinic->TrangThai }}</p>
                <a href="#"><button class="view-btn-2" style="font-size: xx-large;">Xác nhận</button></a> <br><br>
            </div>
        </div>
    </div>
@stop()
