<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\HoSo;
use App\Models\ThuTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        return view('citizen.homepage');
    }

    public function boThuTuc(){
        $thutuc = DB::table('thutuc')->leftjoin('linhvuc','thutuc.id_malinhvuc','=','linhvuc.id_malinhvuc')
                                    ->get();
        return view('citizen.bothutuc',compact('thutuc'));
    }

    public function detailThuTuc($id){
        $thutuc = DB::table('thutuc')->leftjoin('linhvuc', 'thutuc.id_malinhvuc', '=', 'linhvuc.id_malinhvuc')
                                     ->where('thutuc.id','=',$id)->get();

                                     //dd($thutuc);
        return view ('citizen.detailthutuc',compact('thutuc'));
    }

    public function nopHoSo($id){
        $idThutuc = $id;
        $view = ThuTuc::find($id);
        //dd($view->linkform);
        return view($view->linkform,compact('idThutuc'));
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

        return redirect(route('homecitizen'));

    }
}
