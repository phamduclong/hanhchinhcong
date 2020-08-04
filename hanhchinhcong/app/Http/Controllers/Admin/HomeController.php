<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\HoSo;
use App\Models\LinhVuc;
use App\Models\Manager;
use App\Models\ThuTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    public function index(){

        if(Session::has('login')){
            $nhanvien = Manager::paginate(1);
            //$nhanvien = DB::table('manager')->paginate(2);
            return view('admin.homeadmin',compact('nhanvien'));
        }else{
            return redirect(route('login'));
        }
        
    }

    public function getListNhanvien(){
        $nhanvien  = Manager::all();
        return view('admin.nhanvien.list_nhanvien',compact('nhanvien'));
    }

    public function getListCongdan()
    {
        $congdan  = Citizen::paginate(2);
        return view('admin.congdan.list_congdan', compact('congdan'));
    }

    public function getListLinhvuc()
    {
        $linhvuc  = LinhVuc::all();
        return view('admin.linhvuc.list_linhvuc', compact('linhvuc'));
    }

    public function getListThutuc()
    {
        $thutuc  = ThuTuc::all();
        return view('admin.thutuc.list_thutuc', compact('thutuc'));
    }

    public function getListHoso()
    {
        $hoso  = HoSo::all();
        return view('admin.hoso.list_hoso', compact('hoso'));
    }
}
