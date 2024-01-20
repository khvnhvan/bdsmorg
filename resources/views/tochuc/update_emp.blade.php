@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="donator-info-title-1">THÔNG TIN <br>NHÂN VIÊN</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>

        <div class="turn-back-button">
            <div>
                <a href="{{ route('org.org_info') }}">QUAY LẠI</a>
            </div>
        </div>
        <br>
        <form action="{{ route('org.update_emp_check', $employee->id) }}" method="POST"
            style="width: 85%; background-color: #F7E9E8; padding: 5%; ">
            @csrf @method('PUT')
            <div>
                <div class="update-donator-info">
                    <h1>CHỈNH SỬA THÔNG TIN NHÂN VIÊN</h1>
                    <div class="update-donator-info-form">
                        <div style="width: 45%;">
                            <label for="">Họ tên</label><br>
                            <input type="text" name="name" value="{{ $employee->name }}" required
                                oninvalid="this.setCustomValidity('Vui lòng điền tên')"
                                oninput="setCustomValidity('')"><br><br>
                            <label for="">SĐT</label><br>
                            <input type="text" name="phone" value="{{ $employee->phone }}" required
                                oninvalid="this.setCustomValidity('Vui lòng điền SĐT')"
                                oninput="setCustomValidity('')"><br><br>
                            <label for="">Ngày sinh</label><br>
                            <input type="date" name="birthday" value="{{ $employee->birthday }}" required
                                oninvalid="this.setCustomValidity('Vui lòng chọn ngày sinh')"
                                oninput="setCustomValidity('')"><br><br>
                        </div>
                        <div style="width: 45%;">
                            <label for="">Địa chỉ</label><br>
                            <input type="text" name="address" value="{{ $employee->address }}" required
                                oninvalid="this.setCustomValidity('Vui lòng địa chỉ')"
                                oninput="setCustomValidity('')"><br><br>
                            <label for="">Vị trí</label><br>
                            <input type="radio" name="role" value="1"
                                {{ $employee->role == 1 ? 'checked' : ' ' }}>Nhân viên (Y tá, lễ tân) <br>
                            <input type="radio" name="role" value="2"
                                {{ $employee->role == 2 ? 'checked' : ' ' }}>Bác sĩ
                            <br> <br>
                            <label for="gender">Giới tính</label><br>
                            <input type="radio" class="gender" name="gender" value="1"
                                {{ $employee->gender == 1 ? 'checked' : '' }}>Nam
                            <input type="radio" class="gender" name="gender" value="0"
                                {{ $employee->gender == 0 ? 'checked' : '' }}>Nữ
                            <br><br>
                        </div>
                    </div>
                    <button type="submit" value="UPDATE" name="submit" class="submit">UPDATE
                </div>
            </div>
        </form>

        <br><br><br>
    </div>

@stop()
