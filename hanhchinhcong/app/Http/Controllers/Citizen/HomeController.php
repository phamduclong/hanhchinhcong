<?php

namespace App\Http\Controllers\Citizen;

use App\Events\EventSendDataFromCitizen;
use App\Http\Controllers\Controller;
use App\Models\HoSo;
use App\Models\ThuTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    //
    public function index(){
        
            return view('citizen.homepage');
        
    }

    public function boThuTuc(){
        if (Session::has('loginCitizen')) {
            $thutuc = DB::table('thutuc')->leftjoin('linhvuc','thutuc.id_malinhvuc','=','linhvuc.id_malinhvuc')
                                        ->get();
            return view('citizen.bothutuc',compact('thutuc'));
        } else {
            return redirect(route('dangnhap'));
        }
    }

    public function detailThuTuc($id){
        if (Session::has('loginCitizen')) {
            $thutuc = DB::table('thutuc')->leftjoin('linhvuc', 'thutuc.id_malinhvuc', '=', 'linhvuc.id_malinhvuc')
                                        ->where('thutuc.id','=',$id)->get();

                                        //dd($thutuc);
            return view ('citizen.detailthutuc',compact('thutuc'));
        } else {
            return redirect(route('dangnhap'));
        }
    }

    public function nopHoSo($id){
        if (Session::has('loginCitizen')) {
            $idThutuc = $id;
            $view = ThuTuc::find($id);
            //dd($view->linkform);
            return view($view->linkform,compact('idThutuc'));
        } else {
            return redirect(route('dangnhap'));
        }
    }

    public function postHoso(Request $request, $idThutuc){
        $post = $request->all();

        $count = DB::table('hoso')->count();

        $hoso = new HoSo();
        $hoso->namecitizen =  $post['namecitizen'];
        $hoso->phone =  $post['phone'];
        $hoso->email =  $post['email'];
        $hoso->address =  $post['address'];
        $hoso->reason =  $post['reason'];
        $hoso->file =  $post['file'];
        $hoso->status =  'Chưa xử Lý';
        $hoso->id_mathutuc = $idThutuc;
        $hoso->id_hoso = $count+1;
        $hoso->save();

        //$hs = HoSo::max('id_hoso');
        event(new EventSendDataFromCitizen('Vừa Có Một Hồ Sơ Mới Được Nộp'));

        return redirect(route('homecitizen'));

    }

    public function traCuuHoSo(){
        if(Session::has('loginCitizen')){
            $hoso = DB::table('hoso')->leftJoin('thutuc','hoso.id_mathutuc','=','thutuc.id_mathutuc')
                                    ->leftJoin('manager','thutuc.id_mathutuc','=','manager.id_mathutuc')
                                    ->where('hoso.namecitizen','=',Session::get('USERNAME_CITIZEN'))->get();
            return view('citizen.tracuuhoso',compact('hoso'));
        }else{
            return redirect(route('dangnhap'));
        }
    }

    public function editFileHoso($id){
        $hoso = HoSo::find($id);
        return view('citizen.editfilehoso',compact('hoso'));
    }

    public function postEditFileHoso(Request $request,$id){
        $post = $request->all();
        $hoso = HoSo::find($id);
        $hoso->file = $post['file'];
        $hoso->save();
        return redirect(route('tracuuhoso'));
    }
}
