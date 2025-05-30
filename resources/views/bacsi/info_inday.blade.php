@extends('masterview.doctor')
@section('docmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN NGƯỜI <br>HIẾN MÁU TRONG NGÀY</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <a href="{{ route('doc.homtruoc', ['ngayHienTai' => \Carbon\Carbon::parse($ngayHienTai)->toDateString()]) }}">
            Chuyển sang ngày hôm trước
        </a>
        <a href="{{ route('doc.homsau', ['ngayHienTai' => \Carbon\Carbon::parse($ngayHienTai)->toDateString()]) }}">
            Chuyển sang ngày hôm sau
        </a>
        <form action="" style="font-size: x-large;">
            <label for="">Tìm kiếm theo tên: </label>
            <input type="text" name="key"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form>
        <br><br>
        <form action="" style="font-size: x-large;">
            <label for="">Lịch hiến máu theo ngày: </label>
            <input type="date" name="day"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form>
        <br><br>
        <form action="{{ route('doc.info_inday') }}" method="GET">
            <label for="order_by">Sắp xếp theo:</label>
            <select name="order_by" id="order_by" onchange="this.form.submit()"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
                <option value="name" {{ $orderBy == 'name' ? 'selected' : '' }}>Tên</option>
                <option value="A_type" {{ $orderBy == 'A_type' ? 'selected' : '' }}>Nhóm máu A+</option>
                <option value="B_type" {{ $orderBy == 'B_type' ? 'selected' : '' }}>Nhóm máu B+</option>
                <option value="O_type" {{ $orderBy == 'O_type' ? 'selected' : '' }}>Nhóm máu O+</option>
                <option value="AB_type" {{ $orderBy == 'AB_type' ? 'selected' : '' }}>Nhóm máu AB+</option>
                <option value="A_minus_type" {{ $orderBy == 'A_minus_type' ? 'selected' : '' }}>Nhóm máu A-</option>
                <option value="B_minus_type" {{ $orderBy == 'B_minus_type' ? 'selected' : '' }}>Nhóm máu B-</option>
                <option value="O_minus_type" {{ $orderBy == 'O_minus_type' ? 'selected' : '' }}>Nhóm máu O-</option>
                <option value="AB_minus_type" {{ $orderBy == 'AB_minus_type' ? 'selected' : '' }}>Nhóm máu AB-</option>
                <option value="notyet" {{ $orderBy == 'notyet' ? 'selected' : '' }}>Chưa hiến</option>
                <option value="donated" {{ $orderBy == 'donated' ? 'selected' : '' }}>Đã hiến</option>
            </select>
        </form>

        <br><br>
        @if (Session::has('update'))
            <p style="color: red">{{ Session::get('update') }}</p>
        @endif
        <h3>Ngày: {{ $ngayHienTai }}</h3>
        <br>
        <table border="2" style="background-color: #F7E9E8;">
            <tr>
                <th>CCCD - CMT</th>
                <th>Tên</th>
                <th>Nhóm máu</th>
                <th>Giới tính</th>
                <th>Lượng máu hiến (ml)</th>
                <th>Ngày hiến</th>
                <th>Chấp thuận <br>của bác sĩ</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>

            @foreach ($client as $cl)
                <tr>
                    <td>{{ $cl->user_id }}</td>
                    <td>{{ $cl->name }}</td>
                    <td>{{ $cl->NhomMau }}</td>
                    <td>{{ $cl->gender == 0 ? 'Nữ' : 'Nam' }}</td>
                    <td>{{ $cl->LuongMau }}</td>
                    <td>{{ $cl->NgayHien }}</td>
                    <td>{{ $cl->Ykienbacsi == 1 ? 'Được hiến' : 'Không được hiến' }}</td>
                    <td>{{ $cl->TrangThaiHien == 0 ? 'Chưa hiến' : 'Đã hiến' }}</td>
                    <td style=" display: flexbox; justify-content: space-around ;">
                        <a href="{{ route('doc.update_infoinday', $cl->id) }}"><button class="view-btn-2">Cập
                                nhật</button></a>
                        @if ($don < 1)
                            <a href="{{ route('doc.create_clinic', $cl->user_id) }}"><button class="update-btn">Khám
                                    sàng
                                    lọc</button></a>
                        @else
                            <a href="{{ route('doc.check_clinic_homnay', $cl->user_id) }}"><button class="update-btn">Đơn
                                    khám</button></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop()
