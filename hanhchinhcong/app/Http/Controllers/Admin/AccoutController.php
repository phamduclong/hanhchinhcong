<?php

namespace App\Http\Controllers\Admin;

use App\Events\EventCountOnline;
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
            ['block','=','No']
        
        ])->count();

        

        //dd($taikhoan);
        //dd($taikhoan[0]->name);

        if($accout == 1){

            $taikhoan = DB::table('manager')->where([
                ['username', '=', $username],
                ['password', '=', $password],
                ['block', '=', 'No']

            ])->get();

            //dd($taikhoan[0]->type);

            $id = $taikhoan[0]->id;
            $ACCOUT = Manager::find($id);
            $ACCOUT->status_online = 'online';
            $ACCOUT->save();

            $count = DB::table('manager')->where('status_online','=','online')->count();

            Session::put('login','YES');
            Session::put('USERNAME', $taikhoan[0]->name);
            Session::put('typeAdmin',$taikhoan[0]->type);
            // Session::put('TaiKhoan' . $taikhoan[0]->name, $taikhoan[0]->name);

            // dd(Session::all());

            // if(Session::has('TaiKhoan'. $taikhoan[0]->name)){
            //     Session::put('COUNT');
            // }else{
            //     //Session::put('TaiKhoan' . $taikhoan[0]->name , 1);
            //     Session::put('COUNT',1);
            // }

            event(new EventCountOnline($count));

            return redirect(route('homeadmin'));
        }else{
            $message = "Tài khoản hoặc mật khẩu không đúng !!!";
            return view('admin.login',compact('message'));
        }

    }

    public function logout(){
        

        $taikhoan=DB::table('manager')->where('name','=',Session::get('USERNAME'))->get();
        //dd($taikhoan);
        $id = $taikhoan[0]->id;
        $ACCOUT = Manager::find($id);
        $ACCOUT->status_online = 'offline';
        $ACCOUT->save();

        $count = DB::table('manager')->where('status_online', '=', 'online')->count();
        event(new EventCountOnline($count));
        
        Session::forget('login');
        Session::forget('USERNAME');
        Session::forget('typeAdmin');
        return redirect(route('login'));
    }
}
