@extends('masterview.organizer')
@section('orgmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1>THÔNG TIN NGƯỜI <br>HIẾN MÁU TRONG NGÀY</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <h1>THÔNG TIN ĐƠN BỆNH</h1>
        <div class="clinic-info-content">
            <div class="clinic-info-content-left">
                <h4>ĐƠN CỦA NGƯỜI HIẾN</h4>
                <p style="font-size: x-large;">{{ $clinic[0]->name }}</p>

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
                    <p>Cân nặng: {{ $clinic[0]->CanNang }} kg</p>
                    <p>Nhiệt độ: {{ $clinic[0]->NhietDo }} °C</p>
                </div> <br>
                <p>Giờ đo lần 1: {{ $clinic[0]->Time1 }} </p>
                <p>Huyết áp: {{ $clinic[0]->HuyetAp1 }} / 120 mmHg </p>
                <p>Mạch: {{ $clinic[0]->Mach1 }} / phút</p>
                <br>
                <p>Giờ đo lần 2: {{ $clinic[0]->Time2 }} </p>
                <p>Huyết áp: {{ $clinic[0]->HuyetAp2 }} / 120 mmHg </p>
                <p>Mạch: {{ $clinic[0]->Mach2 }} / phút</p>
                <br>
                <p>Hemoglobine: {{ $clinic[0]->Hemoglobine }} g/dl </p>
                <p>Viêm gan siêu vi B: {{ $clinic[0]->ViemGanB }} IU/ml </p>
                <p>Tình trạng lâm sàng:
                    {{ $clinic[0]->TrangThai == 1 ? 'Đủ điều kiện sức khỏe' : 'Không đủ điều kiện sức khỏe' }}</p>
                <a href="{{ route('org.update_clinic', $clinic[0]->id) }}"><button class="view-btn-2"
                        style="font-size: xx-large;">Cập nhật</button></a> <br><br>
            </div>
        </div>
    </div>
@stop()
