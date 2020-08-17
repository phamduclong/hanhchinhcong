<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CitizenController extends Controller
{
    //
    public function dangKy(){
        return view('citizen.dangky');
    }

    public function handleDangky(Request $request){

        $post = $request->all();

        $account = new Citizen();

        $account->username = $post['username'];
        $account->password = $post['password'];
        $account->name = $post['name'];
        $account->phone = $post['phone'];
        $account->email = $post['email'];
        $account->address = $post['address'];
        $account->reason = "Chưa có";
        $account->file = "Chưa có";
        $account->block = "No";
        $account->id_hoso = 0;
        $account->save();

        return redirect(route('dangnhap'));
    }

    public function dangNhap(){
        if (Session::has('loginCitizen')) {
            return redirect(route('homecitizen'));
        }
        return view('citizen.dangnhap');
    }

    public function handleDangnhap(Request $request){
       
        $post = $request->all();
        $username = $post['username'];
        $password = $post['password'];

        //$accout = Manager::all();
        $accout = DB::table('citizen')->where([
            ['username', '=', $username],
            ['password', '=', $password],
            ['block','=','No']

        ])->count();


        if ($accout == 1) {

            $taikhoan = DB::table('citizen')->where([
                ['username', '=', $username],
                ['password', '=', $password],
                ['block','=','No']

            ])->get();

            


            Session::put('loginCitizen', 'YES');
            Session::put('USERNAME_CITIZEN', $taikhoan[0]->name);
            return redirect(route('homecitizen'));
        } else {
            $message = "Tài khoản hoặc mật khẩu không đúng !!!";
            return view('citizen.dangnhap', compact('message'));
        }
    }

    public function dangXuat(){
        
        Session::forget('loginCitizen');
        Session::forget('USERNAME_CITIZEN');
        //return redirect(route('dangnhap'));
        return redirect(route('homecitizen'));
    }
}
