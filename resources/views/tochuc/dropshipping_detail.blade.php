@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">CUNG ỨNG MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <a href="{{ route('org.create_dropshipping') }}"><button class="turn-back-button">Quay lại<I></I></button></a>
        <br><br>
        <h3>Bệnh viện: {{ $vien[0]->TenVien }}</h3>
        <h5>Địa chỉ: {{ $vien[0]->DiaChi }}</h5>
        <table>
            <tr>
                <th>Lần cung ứng</th>
                <th>STT</th>
                <th>Nhóm máu</th>
                <th>Lượng Máu</th>
                <th>Ngày cung ứng</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            <?php for($i = 0; $i < $count; $i ++) {?>
            <tr>
                <td rowspan="9">{{ $i + 1 }}</td>
            </tr>
            <?php for($j = 1; $j < 9; $j++ ) { ?>
            <tr>
                <?php $q = $j - 1 + 8 * $i; ?>
                <td>{{ $cum[$q]->id }}</td>
                <td>{{ $cum[$q]->NhomMau }}</td>
                <td>{{ $cum[$q]->LuongMau }}</td>
                <td>{{ $cum[$q]->NgayCungUng }}</td>
                <td>{{ $cum[$q]->TrangThai == 0 ? 'Chưa nhận' : 'Đã nhận' }}</td>
                <td>{{ $q }}</td>
            </tr>
            <?php } ?>
            <?php } ?>


        </table>
    </div>

@stop()
