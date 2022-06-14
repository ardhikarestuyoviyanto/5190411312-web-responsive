<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    // Menampilkan view laman login
    public function loginView(){
        return view('auth.login');
    }

    // Menampilkan view laman register
    public function registerView(){
        return view('auth.register');
    }
    
    // Register handler
    public function registerHandler(Request $request){

        // validasi data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:5'
        ]);

        // Pengecekan validasi
        if($validator->fails()){

            // Jika validasi gagal redirect ke laman register, dengan membawa error message
            return redirect()->to('register')->withErrors($validator)->withInput($request->all());
        
        }

        // validasi berhasil lalu, create data
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        // redirect ke laman register membawa flash message session registrasi berhasil
        return redirect()->to('register')->with('message', "Anda berhasil melakukan proses registrasi");

    }

    public function loginHandler(Request $request){

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // validasi login
        if(auth()->attempt($data)){

            // login sukses, simpan data user kedalam session
            $data = [
                'ID' => auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'authenticate' => true,
            ];

            $request->session()->put($data);

            return redirect()->to('dashboard');

        }

        // login gagal
        return redirect()->to('login')->withErrors(['message'=>"email atau password salah"]);

    }

    public function logoutHandler(Request $request){
        // bersihkan session di browser lalu redirect ke laman login
        $request->session()->flush();
        return redirect()->to('login')->with('message', "anda berhasil logout");
    }
    
}
