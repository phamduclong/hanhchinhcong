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

    public function postBlockNhanvien(Request $request,$id){

        //dd($request);
        $post = $request->all();
        $nhanvien = Manager::find($id);
        $nhanvien->block = $post['block'];
        $nhanvien->save();

        return redirect(route('admin_list_nhanvien'));
    }


    public function addNhanvien(){
        return view('admin.nhanvien.add_nhanvien');
    }

    public function postAddNhanvien(Request $request){


        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'id_mathutuc' => 'required'
        ]);



        $post = $request->all();
        $nhanvien = new Manager();
        $nhanvien->name = $post['name'];
        $nhanvien->phone = $post['phone'];
        $nhanvien->email = $post['email'];
        $nhanvien->address = $post['address'];
        $nhanvien->type = 'NoAdmin';
        $nhanvien->block = 'No';
        $nhanvien->id_mathutuc = $post['id_mathutuc'];
        $nhanvien->save();

        return redirect(route('admin_list_nhanvien'));
    }

    public function editNhanvien($id){
        $nhanvien = Manager::find($id);
        return view('admin.nhanvien.edit_nhanvien',compact('nhanvien'));
    }

    public function postEditNhanvien(Request $request,$id){
        $post = $request->all();
        $nhanvien = Manager::find($id);
        $nhanvien->name = $post['name'];
        $nhanvien->phone = $post['phone'];
        $nhanvien->email = $post['email'];
        $nhanvien->address = $post['address'];
        $nhanvien->id_mathutuc = $post['id_mathutuc'];
        $nhanvien->save();
        return redirect(route('admin_list_nhanvien'));
    }

    public function deleteNhanvien($id){
        $nhanvien = Manager::find($id);
        $nhanvien->delete();
        return redirect(route('admin_list_nhanvien'));
    }

    public function searchNhanvien(Request $request){
        $post = $request->all();

        //dd($post);
        if($post['name'] != null){
        $tukhoa = $post['name'];
        $nhanvien = DB::table('manager')->where('name','LIKE', '%' . $tukhoa . '%')->get();

        return view('admin.nhanvien.list_nhanvien',compact('nhanvien','tukhoa'));
        }

        if ($post['type'] != null) {
            $type = $post['type'];
            $nhanvien = DB::table('manager')->where('type', '=',  $type)->get();

            return view('admin.nhanvien.list_nhanvien', compact('nhanvien'));
        }
    }

    public function postBlockCongdan(Request $request, $id)
    {

        //dd($request);
        $post = $request->all();
        $congdan = Citizen::find($id);
        $congdan->block = $post['block'];
        $congdan->save();

        return redirect(route('admin_list_congdan'));
    }
}
