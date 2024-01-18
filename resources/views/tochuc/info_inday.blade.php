@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN NGƯỜI <br>HIẾN MÁU TRONG NGÀY</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <a href="{{ route('org.homtruoc', ['ngayHienTai' => \Carbon\Carbon::parse($ngayHienTai)->toDateString()]) }}">
            Chuyển sang ngày hôm trước
        </a>
        <a href="{{ route('org.homsau', ['ngayHienTai' => \Carbon\Carbon::parse($ngayHienTai)->toDateString()]) }}">
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
        <form action="{{ route('org.info_inday') }}" method="GET">
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
                        <a href="{{ route('org.clinic', $cl->id) }}"><button class="delete-btn">Đơn bệnh</button></a>
                        <a href="{{ route('org.update_infoinday', $cl->id) }}"><button class="view-btn-2">Cập
                                nhật</button></a>
                        <a href="#"><button class="delete-btn">Xóa</button></a>
                        @if ($cl->TrangThai == 1)
                            <button class="view-btn-2" disabled>Đã cấp</button>
                        @else
                            <a href="{{ route('org.create_certificate', $cl->id) }}"><button class="update-btn">Cấp
                                    chứng nhận</button></a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Hiển thị thông tin lịch sử hiến máu ngày hôm trước -->
    @if (isset($lichSuHomTruoc) && count($lichSuHomTruoc) > 0)
        <h3>Ngày: {{ $ngayHomTruoc }}</h3>
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

            @foreach ($lichSuHomTruoc as $cl)
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
                        <a href="{{ route('org.clinic') }}"><button class="delete-btn">Đơn bệnh</button></a>
                        <a href="{{ route('org.update_infoinday', $cl->id) }}"><button class="view-btn-2">Cập
                                nhật</button></a>
                        <a href="#"><button class="delete-btn">Xóa</button></a>
                        <button class="update-btn">Chứng nhận</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif


    <!-- Hiển thị thông tin lịch sử hiến máu ngày hôm sau -->
    @if (isset($lichSuHomSau) && count($lichSuHomSau) > 0)
        <h3>Ngày: {{ $ngayHomSau }}</h3>
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

            @foreach ($lichSuHomSau as $cl)
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
                        <a href="{{ route('org.clinic') }}"><button class="delete-btn">Đơn bệnh</button></a>
                        <a href="{{ route('org.update_infoinday', $cl->id) }}"><button class="view-btn-2">Cập
                                nhật</button></a>
                        <a href="#"><button class="delete-btn">Xóa</button></a>
                        <button class="update-btn">Chứng nhận</button>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@stop()
