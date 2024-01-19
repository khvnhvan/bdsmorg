@extends('masterview.organizer')
@section('orgmain')
    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">CUNG ỨNG MÁU</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <br><br>
        <a href="{{ route('org.create_dropshipping') }}"><button class="turn-back-button">CUNG ỨNG<I></I></button></a>
        <br><br>
        <form action="" style="font-size: x-large;" method="GET">
            <label for="">Tìm bệnh viện: </label>
            <input name="key" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form> <br>
        <form action="" style="font-size: x-large;">
            <label for="">Ngày cung ứng: </label>
            <input name="date" type="date"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
            <input type="submit" style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
        </form>
        <br><br>
        {{-- <form action="{{ route('org.dropshipping') }}" method="GET">
            <label for="order_by">Sắp xếp theo:</label>
            <select name="order_by" id="order_by" onchange="this.form.submit()"
                style="font-size: x-large; font-family: 'Josefin Sans', sans-serif; padding: 0.5%;">
                <option value="name" {{ $orderBy == 'name' ? 'selected' : '' }}>Bệnh viện</option>
                <option value="A_type" {{ $orderBy == 'A_type' ? 'selected' : '' }}>Nhóm máu A+</option>
                <option value="B_type" {{ $orderBy == 'B_type' ? 'selected' : '' }}>Nhóm máu B+</option>
                <option value="O_type" {{ $orderBy == 'O_type' ? 'selected' : '' }}>Nhóm máu O+</option>
                <option value="AB_type" {{ $orderBy == 'AB_type' ? 'selected' : '' }}>Nhóm máu AB+</option>
                <option value="A_minus_type" {{ $orderBy == 'A_minus_type' ? 'selected' : '' }}>Nhóm máu A-</option>
                <option value="B_minus_type" {{ $orderBy == 'B_minus_type' ? 'selected' : '' }}>Nhóm máu B-</option>
                <option value="O_minus_type" {{ $orderBy == 'O_minus_type' ? 'selected' : '' }}>Nhóm máu O-</option>
                <option value="AB_minus_type" {{ $orderBy == 'AB_minus_type' ? 'selected' : '' }}>Nhóm máu AB-</option>
                <option value="donated" {{ $orderBy == 'donated' ? 'selected' : '' }}>Đã nhận</option>
                <option value="notyet" {{ $orderBy == 'notyet' ? 'selected' : '' }}>Chưa nhận</option>
            </select>
        </form> <br> <br> --}}
        {{-- @if (Session::has('success'))
            <p style="color: red">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('update'))
            <p style="color: red">{{ Session::get('update') }}</p>
        @endif
        <br><br> --}}
        <table border="2" style="background-color: #F7E9E8;">
            <tr>
                <th>Tên Bệnh viện / Nhóm máu</th>
                <th>A-</th>
                <th>B-</th>
                <th>O-</th>
                <th>AB-</th>
                <th>A+</th>
                <th>B+</th>
                <th>O+</th>
                <th>AB+</th>
                <th>Hành động</th>
            </tr>
            <?php for ($j = 0; $j < $i; $j++) { 
            ?>
            <tr>
                <td>
                    <?php
                    print $vien[$j]->TenVien;
                    ?>
                </td>
                <?php for($k = 1; $k < 9; $k++) { ?>
                <td>
                    <?php
                    $q = $k - 1 + 8 * $j;
                    print $dropshippingSum[$q];
                    $v = $j + 1;
                    ?>
                </td>
                <?php } ?>
                <td>
                    <a href="{{ route('org.detail_dropshipping', $vien[$j]->id) }}"><button class="update-btn">Chi
                            tiết</button></a>
                </td>
            </tr>
            <?php } ?>
        </table> <br><br>
    </div>
@stop()


{{-- @foreach ($cungung as $cung)
                <tr>
                    <td>{{ $cung->id_vien }}</td>
                    <td>{{ $cung->TenVien }}</td>
                    <td>{{ $cung->NhomMau }}</td>
                    <td>{{ $cung->LuongMau }}</td>
                    <td>{{ $cung->NgayCungUng }}</td>
                    <td>{{ $cung->name }}</td>
                    <td>{{ $cung->TrangThai == 1 ? 'Đã nhận' : 'Chưa nhận' }}</td>
                    <td style=" display: flexbox; justify-content: space-around ;">
                        <a href=""><button class="update-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                    </td>
                </tr>
            @endforeach --}}
