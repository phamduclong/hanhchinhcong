<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AccoutController extends Controller
{
    //
    public function login(){
        if(Session::has('login')){
            return redirect(route('homeadmin'));
        }
        return view('admin.login');
    }

    public function handleLogin(Request $request){


        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);

        $post = $request->all();
        $username = $post['username'];
        $password = $post['password'];

        //$accout = Manager::all();
        $accout = DB::table('manager')->where([
            ['username','=',$username],
            ['password','=',$password],
            ['type','=','Admin']
        
        ])->count();

        

        //dd($taikhoan);
        //dd($taikhoan[0]->name);

        if($accout == 1){

            $taikhoan = DB::table('manager')->where([
                ['username', '=', $username],
                ['password', '=', $password],
                ['type', '=', 'Admin']

            ])->get();

            Session::put('login','YES');
            Session::put('USERNAME', $taikhoan[0]->name);
            return redirect(route('homeadmin'));
        }else{
            $message = "Tài khoản hoặc mật khẩu không đúng !!!";
            return view('admin.login',compact('message'));
        }

    }

    public function logout(){
        Session::forget('login');
        Session::forget('USERNAME');
        return redirect(route('login'));
    }
}
