<?php

namespace App\Http\Controllers;

use App\Models\Phieudangky;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function login(){
        return view('nhanvien.login');
    }

    public function checklogin(){
        request()->validate([
            'id'=>'required|exists:users',
            'password'=>'required',
        ]);
        $data = request()->all('id', 'password');
        if(auth()->attempt($data)){
            return redirect()->route('emp.dashboard');
        }
        return redirect()->back()->with('error', 'Lỗi đăng nhập!');
    }

    public function dashboard()
    {
        $totalblood = DB::table('vwtongmau')->value('Tongmau');
        $Aminus = DB::table('vwtongmauaminus')->value('TongmauAminus');
        $Bminus = DB::table('vwtongmaubminus')->value('TongmauBminus');
        $Ominus = DB::table('vwtongmauominus')->value('TongmauOminus');
        $ABminus = DB::table('vwtongmauabminus')->value('TongmauABminus');
        $Aplus = DB::table('vwtongmauaplus')->value('TongmauAplus');
        $Bplus = DB::table('vwtongmaubplus')->value('TongmauBplus');
        $Oplus = DB::table('vwtongmauoplus')->value('TongmauOplus');
        $ABplus = DB::table('vwtongmauabplus')->value('TongmauABplus');
        $totalppl = DB::table('vwtonguser')->value('TongUser');
        return view('nhanvien.dashboard', compact('totalblood', 'Aminus', 'Bminus','Ominus','ABminus',
                                                'Aplus','Bplus','Oplus','ABplus','totalppl'));
    }

    public function emp_info(){
        $id = Auth::user()->id;
        $nhanvien = DB::table('users')
        ->select('users.*', 'roles.roles')
        ->join('roles', 'roles.id', '=', 'users.role')
        ->where('users.id',$id)->get();
        return view('nhanvien.emp_info', compact('nhanvien'));
    }

    public function update_emp(string $id){
        $employee = DB::table('users')->find($id);
        return view('nhanvien.update_emp', compact('employee'));
    }

    public function update_emp_check(string $id, Request $request){
        $employee = User::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('emp.emp_info')->with('update','Cập nhật nhân viên thành công!');
    }

    public function cusInfo(Request $request) {
        $orderBy = $request->input('order_by','name');
        $client = $this->getSortedInfo($orderBy);
        if($key = request()->key){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('name','like','%'.$key.'%')
            -> paginate(10);
        }
        if($live = request()->live){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('address',$live)
            -> paginate(10);
        }
        if($work = request()->work){
            $client = DB::table('users')
            ->select('users.*', 'nhommau.NhomMau')
            -> join('nhommau', 'nhommau.MaMau', '=', 'users.MaMau')
            -> where('workplace',$work)
            -> paginate(10);
        }
        return view('nhanvien.cus_info', compact('client','orderBy'));
    }

    private function getSortedInfo($orderBy){
        switch($orderBy){
        case 'name':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->orderBy('name', 'desc')->paginate(10);
            break;
        case 'A_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'A+')->paginate(10);
            break;
        case 'B_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'B+')->paginate(10);
            break;
        case 'O_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'O+')->paginate(10);
            break;
        case 'AB_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'AB+')->paginate(10);
            break;
        case 'A_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'A-')->paginate(10);
            break;
        case 'B_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'B-')->paginate(10);
            break;
        case 'O_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'O-')->paginate(10);
            break;
        case 'AB_minus_type':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('nhommau','=', 'AB-')->paginate(10);
            break;
        case 'birthday':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->orderBy('birthday', 'desc')->paginate(10);
            break;
        case 'donated':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('TrangThaiHien', '=', '1')->paginate(10);
            break;
        case 'notyet':
            $client = DB::table('vwinfoclient')->select('vwinfoclient.*')->where('TrangThaiHien', '=', NULL)->paginate(10);
            break;
        }
        return $client;
    }

    public function info_inday(Request $request, $ngayHienTai = null) {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();

        //Lấy dữ liệu hiến máu trong ngày
        $client = $this->getSortedClients($orderBy, $ngayHienTai);
        
        // Kiểm tra nếu có từ khóa tìm kiếm, lọc dữ liệu
        if($key = request()->key){
            $client = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }
                                                                                                                                                                                                                                                                           
        return view('nhanvien.info_inday', compact('client','orderBy', 'ngayHienTai', 'key'));
    }

    public function ngayHomTruoc(Request $request, $ngayHienTai = null)
    {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();
        if($key = request()->key){
            $lichSuHomTruoc = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }

        // Lấy lịch sử hiến máu ngày hôm trước
        $ngayHomTruoc = Carbon::parse($ngayHienTai)->subDay()->toDateString();
        $lichSuHomTruoc = $this->getSortedClients($orderBy, $ngayHomTruoc);
        return view('nhanvien.homtruoc', compact('orderBy', 'lichSuHomTruoc', 'key', 'ngayHomTruoc', 'ngayHienTai'));
    }
    
    public function ngayHomSau(Request $request, $ngayHienTai = null)
    {
        $orderBy = $request->input('order_by','name');
        // Kiểm tra xem $ngayHienTai có giá trị không, nếu không thì lấy ngày hiện tại
        $ngayHienTai = $ngayHienTai ?? now()->toDateString();
        // Kiểm tra nếu có từ khóa tìm kiếm, lọc dữ liệu
        if($key = request()->key){
            $lichSuHomSau = DB::table('vwindaynew')->select('vwindaynew.*')
            -> where('name','LIKE', '%'.$key.'%')->get();
        }
        // Lấy lịch sử hiến máu ngày hôm sau
        $ngayHomSau = Carbon::parse($ngayHienTai)->addDay()->toDateString();
        $lichSuHomSau = $this->getSortedClients($orderBy, $ngayHomSau);
        return view('nhanvien.homsau', compact('orderBy', 'lichSuHomSau', 'key', 'ngayHomSau', 'ngayHienTai'));
    }

    private function getSortedClients($orderBy, $ngayHienTai){
        switch($orderBy){
            case 'name': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->orderBy('name', 'desc')->get();
                break;
            case 'A_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'A+')->get();
                break;
            case 'B_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'B+')->get();
                break;
            case 'O_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'O+')->get();
                break;
            case 'AB_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'AB+')->get();
                break;
            case 'A_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'A-')->get();
                break;
            case 'B_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'B-')->get();
                break;
            case 'O_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'O-')->get();
                break;
            case 'AB_minus_type': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('nhommau','=', 'AB-')->get();
                break;
            case 'donated': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('TrangThaiHien', '=', '1')->get();
                break;
            case 'notyet': 
                $client = DB::table('vwindaynew')->select('vwindaynew.*')->where('NgayHien', $ngayHienTai)->where('TrangThaiHien', '=', '0')->get();
                break;
            }
        return $client;
    }

    public function update_infoinday($id){
        $user = DB::table('users')->get();
        $phieu = DB::table('phieudangky')->find($id);
        $don = DB::table('donkham')->select('donkham.TrangThai', 'phieudangky.*')
        ->join('phieudangky', 'phieudangky.user_id', '=', 'donkham.user_id')
        ->where('phieudangky.id', $id)
        ->get();
        return view('nhanvien.update_infoinday', compact('phieu', 'don'));
    }

    public function update_infoinday_check(Request $request, $id){
        // DB::table('donkham')->select('donkham.TrangThai', 'phieudangky.*')
        // ->join('phieudangky', 'phieudangky.user_id', '=', 'donkham.user_id')
        // ->where('phieudangky.id', $id)->update($request->only('id','TrangThai'));
        DB::table('phieudangky')->update($request->only('id', 'TrangThaiHien', 'Ykienbacsi'));
        return redirect()->route('emp.info_inday')->with('update','Cập nhật phiếu hiến thành công!');
    }
    
    public function cus_detail(Request $request, $id){
        $stt = 1;
        $detail = DB::table('vwhistorydonateblood')->select('vwhistorydonateblood.*')->where('id', $id)->first();
        return view('nhanvien.cus_detail', compact('detail','stt'));
    }

    public function create_cus(){
        $blood = DB::table('nhommau')->get();
        return view('nhanvien.create_cus', compact('blood'));
    }

    public function store_cus(Request $request){
        $request->validate([
            'id' => 'required|max:12|unique:users,id',
            'name' => 'required',
            'gender' => 'required',
            'MaMau' => 'required',
            'phone' => 'required|max:20|unique:users,phone',
            'address' => 'required',
            'birthday' => 'required',
            'password' => 'required',
            'role' => 'required',
            'updated_at' => 'nullable',
            'created_at' => 'nullable'
        ]);
    
        User::create($request->all());
        return redirect()->route('emp.cus_info')->with('success','Thêm người hiến mới thành công!');
    }

    public function update_cus(string $id){
        $blood = DB::table('nhommau')->get();
        $customer = DB::table('users')->find($id);
        return view('nhanvien.update_cus', compact('blood','customer'));
    }

    public function update_cus_check(Request $request, string $id){
        $customer = User::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('emp.cus_info')->with('update','Cập nhật người hiến thành công!');
    }
    // }
    public function delete_cus($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('emp.cus_info');
    }

    public function appt_schedule(){
        $appointment = DB::table('lichhienmau')
        ->select('lichhienmau.*')
        ->get();
        return view('nhanvien.appt_schedule', compact('appointment'));
    }

    public function clinic($id){
            $ngayHienTai = date('20y-m-d');
    
            $answer_id = DB::table('phieudangky')
            ->select('phieudangky.MaCauTL')
            ->join('lichhienmau', 'phieudangky.id_lich', '=', 'lichhienmau.id')
            ->where('phieudangky.id', '=', $id, 'and', 'lichhienmau.NgayHien', '=', $ngayHienTai)
            ->get();
            
            $answer = DB::table('phieutraloi')
                ->select('phieutraloi.*')
                ->where('phieutraloi.MaCauTL', $answer_id[0]->MaCauTL)
                ->get();
             
            $date = DB::table('phieudangky')
                ->select('lichhienmau.NgayHien')
                ->join('lichhienmau', 'lichhienmau.id', '=', 'phieudangky.id_lich')
                ->where('phieudangky.MaCauTL', '=', $answer[0]->MaCauTL)
                ->get();
    
            $question = DB::table('cauhoi')
                ->select('cauhoi.*')
                ->get();
            //SELECT * FROM `donkham` d INNER JOIN phieutraloi p on p.MaCauTL = d.MaCauTL 
            //INNER JOIN phieudangky k on k.user_id = p.user_id WHERE k.id = 1;
            $clinic = DB::table('donkham')->select('donkham.*', 'users.name')
            ->join('phieutraloi', 'phieutraloi.MaCauTL', '=', 'donkham.MaCauTL')
            ->join('phieudangky', 'phieudangky.user_id', '=', 'phieutraloi.user_id')
            ->join('users', 'phieudangky.user_id', '=', 'users.id')
            ->where('phieudangky.id', '=', $id)
            ->get();
            return view('nhanvien.clinic', compact('answer', 'date', 'question', 'clinic'));
        }

    public function logout(){
        Auth::logout();
        return redirect()->route('emp.login');
    }
}
