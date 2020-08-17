<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventSendNoteFromManager;
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
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.homeadmin',compact('nhanvien','count'));
        }else{
            return redirect(route('login'));
        }
        
    }

    public function getListNhanvien(){
        if (Session::has('login')) {
            $nhanvien  = Manager::all();
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.nhanvien.list_nhanvien',compact('nhanvien','count'));
        } else {
            return redirect(route('login'));
        }
    }

    public function getListCongdan()
    {
        if (Session::has('login')) {
            $congdan  = Citizen::paginate(2);
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.congdan.list_congdan', compact('congdan','count'));
        } else {
            return redirect(route('login'));
        }
    }

    public function getListLinhvuc()
    {
        if (Session::has('login')) {
            $linhvuc  = LinhVuc::all();
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.linhvuc.list_linhvuc', compact('linhvuc','count'));
        } else {
            return redirect(route('login'));
        }
    }

    public function addLinhvuc(){
        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        return view('admin.linhvuc.add_linhvuc',compact('count'));
    }

    public function postAddLinhvuc(Request $request){
        $post = $request->all();

        //$count = DB::table('linhvuc')->count();
        $count = LinhVuc::max('id');

        $linhvuc = new LinhVuc();
        $linhvuc->namelinhvuc = $post['namelinhvuc'];
        $linhvuc->id_malinhvuc = $count + 1;
        $linhvuc->save();

        return redirect(route('admin_list_linhvuc'));
    }

    public function editLinhvuc($id){
        $linhvuc = LinhVuc::find($id);
        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        return view('admin.linhvuc.edit_linhvuc',compact('linhvuc','count'));
    }

    public function postEditLinhvuc(Request $request,$id){
        $post = $request->all();
        $linhvuc = LinhVuc::find($id);
        $linhvuc->namelinhvuc = $post['namelinhvuc'];
        $linhvuc->save();
        return redirect(route('admin_list_linhvuc'));
    }

    public function deleteLinhvuc($id){
        $linhvuc = LinhVuc::find($id);
        $linhvuc->delete();
        return redirect(route('admin_list_linhvuc'));
    }

    public function getListThutuc()
    {
        if (Session::has('login')) {
            $thutuc  = ThuTuc::all();
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.thutuc.list_thutuc', compact('thutuc','count'));
        } else {
            return redirect(route('login'));
        }
    }

    public function addThutuc(){
        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        return view('admin.thutuc.add_thutuc',compact('count'));
    }

    public function postAddThutuc(Request $request){
        $post = $request->all();
        $count = ThuTuc::max('id');
        $thutuc = new ThuTuc();
        
        $thutuc->namethutuc = $post['namethutuc'];
        $thutuc->id_mathutuc = $count+1;
        $thutuc->mucdo = $post['mucdo'];
        $thutuc->id_malinhvuc = $post['id_malinhvuc'];
        $thutuc->linkform = $post['linkform'];
        $thutuc->save();

        return redirect(route('admin_list_thutuc'));
    }

    public function editThutuc($id){
        $thutuc = ThuTuc::find($id);
        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        return view('admin.thutuc.edit_thutuc',compact('thutuc','count'));
    }

    public function postEditThutuc(Request $request,$id){
        $post = $request->all();
        $thutuc = ThuTuc::find($id);

        $thutuc->namethutuc = $post['namethutuc'];
        $thutuc->mucdo = $post['mucdo'];
        $thutuc->id_malinhvuc = $post['id_malinhvuc'];
        $thutuc->linkform = $post['linkform'];
        $thutuc->save();

        return redirect(route('admin_list_thutuc'));

    }

    public function deleteThutuc($id){
        $thutuc = ThuTuc::find($id);
        $thutuc->delete();
        return redirect(route('admin_list_thutuc')); 
    }

    public function getListHoso()
    {
        if (Session::has('login')) {
            if(Session::get('typeAdmin') == 'Admin'){
                $hoso  = HoSo::all();
            }else{
                $hoso = DB::table('hoso')->leftJoin('thutuc','hoso.id_mathutuc','=','thutuc.id_mathutuc')
                                         ->leftJoin('manager','thutuc.id_mathutuc','=','manager.id_mathutuc')
                                         ->where('manager.name','=',Session::get('USERNAME'))->get();
            }
            
            $count = DB::table('manager')->where('status_online', '=', 'online')->count();
            return view('admin.hoso.list_hoso', compact('hoso','count'));
        } else {
            return redirect(route('login'));
        }
    }

    public function nhanHoSo($id){
        $hoso = HoSo::find($id);

        //Xử lý logic thông báo

        if(Session::has('numberOfMessage' . Session::get('USERNAME_CITIZEN'))){
            if($hoso->status == 'Đã Trả Kết Quả' || $hoso->status == 'Chưa xử Lý'){
                $numberOfMessage = Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')) + 1;
                Session::put('numberOfMessage'.Session::get('USERNAME_CITIZEN'), $numberOfMessage);

                $array = Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN'));
                array_push($array, 'Một hồ sơ của bạn đang được xử lý');
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'),$array);
            }
        }else{
            if($hoso->status == 'Đã Trả Kết Quả'|| $hoso->status == 'Chưa xử Lý'){
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 1);

                $array = array('Một hồ sơ của bạn đang được xử lý');
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }else{
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 0);

                $array = array();
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }
        }
        //Kết thúc xử lý

        $hoso->status = "Đang xử Lý";
        $hoso->save();

        $hs = DB::table('hoso')->where('id','=',$id)->get();
        event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')), Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN')) ));

        return redirect(route('admin_list_hoso'));
    }

    public function traHoSo($id)
    {
        $hoso = HoSo::find($id);

        //Xử lý logic thông báo
        if (Session::has('numberOfMessage' . Session::get('USERNAME_CITIZEN'))) {
            if ($hoso->status == 'Đang xử Lý'|| $hoso->status == 'Chưa xử Lý') {
                $numberOfMessage = Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')) + 1;
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), $numberOfMessage);

                $array = Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN'));
                array_push($array, 'Một hồ sơ của bạn đã được duyệt');
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }
        } else {
            if($hoso->status == 'Đang xử Lý'|| $hoso->status == 'Chưa xử Lý'){
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 1);

                $array = array('Một hồ sơ của bạn đã được duyệt');
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }else{
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 0);

                $array = array();
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }
        }
        //Kết thúc xử lý


        $hoso->status = "Đã Trả Kết Quả";
        $hoso->save();

        $hs = DB::table('hoso')->where('id', '=', $id)->get();
        event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')) , Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN')) ));
        return redirect(route('admin_list_hoso'));
    }

    public function ghiChuHoSo($id){
        $hoso = HoSo::find($id);
        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        return view('admin.hoso.ghi_chu_ho_so',compact('hoso','count'));
    }

    public function postGhiChuHoSo(Request $request,$id){
        $post = $request->all();
        $hoso = HoSo::find($id);


        //Xử lý logic thông báo
        if (Session::has('numberOfMessage' . Session::get('USERNAME_CITIZEN'))) {
            if ($hoso->note != $post['note']) {
                $numberOfMessage = Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')) + 1;
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), $numberOfMessage);

                $array = Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN'));
                array_push($array, $post['note']);
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            }
        } else {
            if ($hoso->note != $post['note']) {
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 1);

                $array = array($post['note']);
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'), $array);
            } else {
                Session::put('numberOfMessage' . Session::get('USERNAME_CITIZEN'), 0);

                $array = array();
                Session::put('contentOfMessage' . Session::get('USERNAME_CITIZEN'),$array);
            }
        }
        //Kết thúc xử lý

        $hoso->note = $post['note'];
        $hoso->save();

        $hs = DB::table('hoso')->where('id', '=', $id)->get();
        event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . Session::get('USERNAME_CITIZEN')) , Session::get('contentOfMessage' . Session::get('USERNAME_CITIZEN')) ));
        return redirect(route('admin_list_hoso'));
    }

    public function deleteAllMessage(){
        Session::forget('numberOfMessage'. Session::get('USERNAME_CITIZEN'));
        Session::forget('contentOfMessage'. Session::get('USERNAME_CITIZEN'));
        return redirect(route('tracuuhoso'));
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

    public function xuLyThongBao(){
        return redirect(route('admin_list_hoso'));
    }
}
