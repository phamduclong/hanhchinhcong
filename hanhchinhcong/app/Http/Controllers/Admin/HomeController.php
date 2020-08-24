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
        //$thutuc = ThuTuc::find($id);

        //xử lý xóa thủ tục
        $thutuc = DB::table('thutuc')->leftJoin('hoso','thutuc.id_mathutuc','=','hoso.id_mathutuc')
                                     ->where('thutuc.id','=',$id)->get();
        if($thutuc[0]->id == null){
            $TT = ThuTuc::find($id);
            $TT->delete();
            //dd('đc xóa');
        }                             
                                     
        //end
        //$thutuc->delete();
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

                // if(Session::has('numberOfMessage' . $hoso->namecitizen)){
                //     if($hoso->status == 'Đã Trả Kết Quả' || $hoso->status == 'Chưa xử Lý'){
                //         $numberOfMessage = Session::get('numberOfMessage' . $hoso->namecitizen) + 1;
                //         Session::put('numberOfMessage'.$hoso->namecitizen, $numberOfMessage);

                //         $array = Session::get('contentOfMessage' . $hoso->namecitizen);
                //         array_push($array, 'Một hồ sơ của bạn đang được xử lý');
                //         Session::put('contentOfMessage' . $hoso->namecitizen,$array);
                //     }
                // }else{
                //     if($hoso->status == 'Đã Trả Kết Quả'|| $hoso->status == 'Chưa xử Lý'){
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 1);

                //         $array = array('Một hồ sơ của bạn đang được xử lý');
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }else{
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 0);

                //         $array = array();
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }
                // }
        //Kết thúc xử lý

        $hoso->status = "Đang xử Lý";
        $hoso->save();

        $hs = DB::table('hoso')->where('id','=',$id)->get();

        //xu ly event
        // $citizen = DB::table('citizen')->where('name','=',$hs[0]->namecitizen)->get();
        //  dd($citizen);
        // if($citizen != null){
        //     dd('ok');
        // }

        // if($hs[0]->namecitizen == Session::get('USERNAME_CITIZEN')){
        // if ($hs[0]->id_hoso == $citizen[0]->id_hoso) {  // Cứ tài khoản mà có id_hoso trùng với cái id_hoso hồ sơ vừa thay đổi thì event được gọi   
        // event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . $hs[0]->namecitizen), Session::get('contentOfMessage' . $hs[0]->namecitizen) ));
        // }
        event(new EventSendNoteFromManager($hs));
        return redirect(route('admin_list_hoso'));
    }

    public function traHoSo($id)
    {
        $hoso = HoSo::find($id);

        //Xử lý logic thông báo
                // if (Session::has('numberOfMessage' . $hoso->namecitizen)) {
                //     if ($hoso->status == 'Đang xử Lý'|| $hoso->status == 'Chưa xử Lý') {
                //         $numberOfMessage = Session::get('numberOfMessage' . $hoso->namecitizen) + 1;
                //         Session::put('numberOfMessage' . $hoso->namecitizen, $numberOfMessage);

                //         $array = Session::get('contentOfMessage' . $hoso->namecitizen);
                //         array_push($array, 'Một hồ sơ của bạn đã được duyệt');
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }
                // } else {
                //     if($hoso->status == 'Đang xử Lý'|| $hoso->status == 'Chưa xử Lý'){
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 1);

                //         $array = array('Một hồ sơ của bạn đã được duyệt');
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }else{
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 0);

                //         $array = array();
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }
                // }
        //Kết thúc xử lý


        $hoso->status = "Đã Trả Kết Quả";
        $hoso->save();

        $hs = DB::table('hoso')->where('id', '=', $id)->get();

        //xu ly event
        //$citizen = DB::table('citizen')->where('name', '=', $hs[0]->namecitizen)->get();
        //  dd($citizen);
        // if($citizen != null){
        //     dd('ok');
        // }

        // if($hs[0]->namecitizen == Session::get('USERNAME_CITIZEN')){
        //if ($hs[0]->id_hoso == $citizen[0]->id_hoso) {
        // event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . $hs[0]->namecitizen) , Session::get('contentOfMessage' . $hs[0]->namecitizen) ));
        //}
        event(new EventSendNoteFromManager($hs));
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
                // if (Session::has('numberOfMessage' . $hoso->namecitizen)) {
                //     if ($hoso->note != $post['note']) {
                //         $numberOfMessage = Session::get('numberOfMessage' . $hoso->namecitizen) + 1;
                //         Session::put('numberOfMessage' . $hoso->namecitizen, $numberOfMessage);

                //         $array = Session::get('contentOfMessage' . $hoso->namecitizen);
                //         array_push($array, $post['note']);
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     }
                // } else {
                //     if ($hoso->note != $post['note']) {
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 1);

                //         $array = array($post['note']);
                //         Session::put('contentOfMessage' . $hoso->namecitizen, $array);
                //     } else {
                //         Session::put('numberOfMessage' . $hoso->namecitizen, 0);

                //         $array = array();
                //         Session::put('contentOfMessage' . $hoso->namecitizen,$array);
                //     }
                // }
        //Kết thúc xử lý

        $hoso->note = $post['note'];
        $hoso->save();

        $hs = DB::table('hoso')->where('id', '=', $id)->get();

        //xu ly event
        //$citizen = DB::table('citizen')->where('name', '=', $hs[0]->namecitizen)->get();
        //  dd($citizen);
        // if($citizen != null){
        //     dd('ok');
        // }

        // if($hs[0]->namecitizen == Session::get('USERNAME_CITIZEN')){
        //if ($hs[0]->id_hoso == $citizen[0]->id_hoso) {
        // event(new EventSendNoteFromManager($hs , Session::get('numberOfMessage' . $hs[0]->namecitizen) , Session::get('contentOfMessage' . $hs[0]->namecitizen) ));
        //}
        event(new EventSendNoteFromManager($hs));
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

        $nhanvien->username = $post['username'];
        $nhanvien->password = $post['password'];
        
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

    //báo cáo thủ tục
    public function reportThutuc(){
        

        $thutuc = DB::table('thutuc')
        ->join('hoso','thutuc.id_mathutuc','=','hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosotiepnhan')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        $thutuc1 = DB::table('thutuc')
        ->join('hoso', 'thutuc.id_mathutuc', '=', 'hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosodagiaiquyet')
        ->where('hoso.status','=','Đã Trả Kết Quả')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        $thutuc2 = DB::table('thutuc')
        ->join('hoso', 'thutuc.id_mathutuc', '=', 'hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosodanggiaiquyet')
        ->where('hoso.status', '=', 'Đang xử Lý')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        //dd($thutuc2);
        return view('admin.thutuc.report_thutuc',compact('thutuc','thutuc1','thutuc2'));
    }

    //export exel

    public function exportReport(){
        $thutuc = DB::table('thutuc')
        ->join('hoso', 'thutuc.id_mathutuc', '=', 'hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosotiepnhan')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        $thutuc1 = DB::table('thutuc')
        ->join('hoso', 'thutuc.id_mathutuc', '=', 'hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosodagiaiquyet')
        ->where('hoso.status', '=', 'Đã Trả Kết Quả')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        $thutuc2 = DB::table('thutuc')
        ->join('hoso', 'thutuc.id_mathutuc', '=', 'hoso.id_mathutuc')
        ->selectRaw('thutuc.id as STT,thutuc.namethutuc as tenthutuc, count(*) as sohosodanggiaiquyet')
        ->where('hoso.status', '=', 'Đang xử Lý')
        ->groupBy('thutuc.id_mathutuc')
        ->get();

        $html = '<h2>Hồ Sơ Tiếp Nhận</h2>
                        
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ tiếp nhận</th>
                            </tr>
                            </thead>
                            <tbody id="show_data">';
        foreach($thutuc as $tt){
            $html .= '<tr>
                                    <td>'.$tt->STT.'</td>
                                    <td>'.$tt->tenthutuc.'</td>
                                    <td>'.$tt->sohosotiepnhan.'</td>
                                    
                                </tr>';
        } 
        $html .= '</tbody>
                        </table>

                        <br>

                        <h2>Hồ Sơ Đã Giải Quyết</h2>

                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ đã giải quyết</th>
                            </tr>
                            </thead>
                            <tbody id="show_data">';

        foreach ($thutuc1 as $tt1) {
            $html .= '<tr>
                                    <td>' . $tt1->STT . '</td>
                                    <td>' . $tt1->tenthutuc . '</td>
                                    <td>' . $tt1->sohosodagiaiquyet . '</td>
                                    
                                </tr>';
        } 
        $html .= '</tbody>
                        </table>

                        <br>

                        <h2>Hồ Sơ Đang Giải Quyết</h2>
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ đang giải quyết</th>
                            </tr>
                            </thead>
                            <tbody id="show_data">';
        foreach ($thutuc2 as $tt2) {
            $html .= '<tr>
                                    <td>' . $tt2->STT . '</td>
                                    <td>' . $tt2->tenthutuc . '</td>
                                    <td>' . $tt2->sohosodanggiaiquyet . '</td>
                                    
                                </tr>';
        }     
        $html .= '</tbody>
                        </table>' ;

        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=report.xls');
        echo $html;                
    }





}
