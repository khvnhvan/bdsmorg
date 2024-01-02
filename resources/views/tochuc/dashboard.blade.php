@extends('masterview.organizer')
@section('orgmain')

    <div class="dashboard-container">
        <div class="dashboard-title">
            <h1 class="dashboard-title-1">DASHBOARD</h1>
            <h1 style="text-align: right;">THE BDSM <br>PROJECT</h1>
        </div>
        <!-- ////////////////////////////// -->
        <div class="dashboard-left-container">
            <div class="dashboard-div-1">
                <div class="dashboard-div-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="53.506" height="65.771" viewBox="0 0 53.506 65.771">
                        <path id="IcRoundWaterDrop"
                            d="M32.96,3.16a3.4,3.4,0,0,0-4.448,0Q4.033,24.73,4,40.681C4,57.335,16.708,68.1,30.753,68.1S57.506,57.335,57.506,40.681Q57.506,24.73,32.96,3.16ZM16.808,41.35a2.511,2.511,0,0,1,2.475,2.073,11.33,11.33,0,0,0,12.173,9.6,2.511,2.511,0,1,1,.234,5.016A16.3,16.3,0,0,1,14.333,44.26a2.508,2.508,0,0,1,2.475-2.909Z"
                            transform="translate(-4 -2.332)" fill="#ed2e2e"></path>
                    </svg>
                    <h1 class="blood-amount">
                        {{ $totalblood }}
                    </h1>
                    <p class="blood-amount-title">ml máu đã tiếp nhận</p>
                </div>
                <div class="dashboard-div-4">
                    <img src="{{ url('public/organizersite') }}/img/doner@2x.png" alt="">
                    <h1>
                        {{ $totalppl }}
                    </h1>
                    <p>Nguời đã đăng kí</p>
                </div>
                <div class="dashboard-div-5">
                    <img src="{{ url('public/organizersite') }}/img/employee@2x.png" alt="">
                    <h1>65/200</h1>
                    <p>Số đơn vị đã nhận trong ngày / Số đơn vị cần trong ngày </p>
                </div>
            </div>

            <div class="dashboard-div-2">
                <div class="dashboard-div-6">
                    <div class="dashboard-div-6-1">
                        <p class="blood-type-o">O-</p>
                        @if ($Ominus < 1000)
                            <p style="color: red">
                                {{ $Ominus }}
                                / 2000ml <br><br>
                                THIẾU MÁU TRẦM TRỌNG
                            </p>
                        @elseif ($Ominus < 2000)
                            <p style="color: red">
                                {{ $Ominus }}
                                / 2000ml <br>
                                CẢNH BÁO THIẾU MÁU
                            </p>
                        @else
                            <p style="color: #668884">
                                {{ $Ominus }}
                                / 2000ml
                            </p>
                        @endif
                    </div>
                    <div class="dashboard-div-6-2">
                        <div style="width: 50%; height: auto;">
                            <div class="dashboard-div-6-2-1">
                                <div style="width: 100%;">
                                    <p class="blood-type">A-</p>
                                    @if ($Aminus < 1000)
                                        <p style="color: red">
                                            {{ $Aminus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($Aminus < 2000)
                                        <p style="color: red">
                                            {{ $Aminus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $Aminus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                            <div class="dashboard-div-6-2-2">
                                <div style="width: 100%;">
                                    <p class="blood-type">B-</p>
                                    @if ($Bminus < 1000)
                                        <p style="color: red">
                                            {{ $Bminus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($Bminus < 2000)
                                        <p style="color: red">
                                            {{ $Bminus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $Bminus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                        </div>
                        <div style="width: 50%; height: auto;" <div>
                            <div class="dashboard-div-6-2-3">
                                <div style="width: 100%;">
                                    <p class="blood-type">AB-</p>
                                    @if ($ABminus < 1000)
                                        <p style="color: red">
                                            {{ $ABminus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($ABminus < 2000)
                                        <p style="color: red">
                                            {{ $ABminus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $ABminus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                        </div>
                    </div> <br>
                    <div class="dashboard-div-6-1">
                        <p class="blood-type-o">O+</p>
                        @if ($Oplus < 1000)
                            <p style="color: red">
                                {{ $Oplus }}
                                / 2000ml <br><br>
                                THIẾU MÁU TRẦM TRỌNG
                            </p>
                        @elseif ($Oplus < 2000)
                            <p style="color: red">
                                {{ $Oplus }}
                                / 2000ml <br>
                                CẢNH BÁO THIẾU MÁU
                            </p>
                        @else
                            <p style="color: #668884">
                                {{ $Oplus }}
                                / 2000ml
                            </p>
                        @endif
                    </div>
                    <div class="dashboard-div-6-2">
                        <div style="width: 50%; height: auto;">
                            <div class="dashboard-div-6-2-1">
                                <div style="width: 100%;">
                                    <p class="blood-type">A+</p>
                                    @if ($Aplus < 1000)
                                        <p style="color: red">
                                            {{ $Aplus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($Aplus < 2000)
                                        <p style="color: red">
                                            {{ $Aplus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $Aplus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                            <div class="dashboard-div-6-2-2">
                                <div style="width: 100%;">
                                    <p class="blood-type">B+</p>
                                    @if ($Bplus < 1000)
                                        <p style="color: red">
                                            {{ $Bplus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($Bplus < 2000)
                                        <p style="color: red">
                                            {{ $Bplus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $Bplus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                        </div>
                        <div style="width: 50%; height: auto;" <div>
                            <div class="dashboard-div-6-2-3">
                                <div style="width: 100%;">
                                    <p class="blood-type">AB+</p>
                                    @if ($ABplus < 1000)
                                        <p style="color: red">
                                            {{ $ABplus }}
                                            / 2000ml <br><br>
                                            THIẾU MÁU TRẦM TRỌNG
                                        </p>
                                    @elseif ($ABplus < 2000)
                                        <p style="color: red">
                                            {{ $ABplus }}
                                            / 2000ml <br>
                                            CẢNH BÁO THIẾU MÁU
                                        </p>
                                    @else
                                        <p style="color: #668884">
                                            {{ $ABplus }}
                                            / 2000ml
                                        </p>
                                    @endif
                                </div>
                                <div style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-div-7">
                    <div style="width: 100%;">
                        <img src="{{ url('public/organizersite') }}/img/2-sign-hand@2x.png" alt="" width="70%"
                            height="auto">
                        <h1>50</h1>
                        <p>Người đã tham gia hiến máu <br>ít nhất 1 lần</p>
                    </div>
                    <div style="width: 0%;"></div>
                </div>
                {{-- <a href="org_info.php" class="a-dashboard-div-8" style="text-decoration: none;">
                    <div class="dashboard-div-8">
                        <div style="width: 100%;">
                            <img src="{{ url('public/organizersite') }}/img/continue-to-org-info@2x.png" alt=""
                                width="70%" height="auto">
                            <p>Thông tin về tổ chức</p>
                        </div>
                        <div style="width: 0%;"></div>
                    </div>
                </a> --}}
            </div>
        </div>
    </div>

@stop()
