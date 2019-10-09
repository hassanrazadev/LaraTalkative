<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userLogin(){
        return view('auth.user-login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userRegister(){
        return view('auth.user-register');
    }

    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('error', 'Error! there is error while logging in');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $user = User::create($request->all());
        if ($user){
            auth()->login($user);
            return redirect()->route('home')->with('success', 'Congratulations! new account created');
        }else{
            return redirect()->back()->with('error' , 'Error! there is error while creating account');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function doLogout(){
        if (auth()->check()){
            auth()->logout();
        }
        return redirect()->route('userLogin');
    }
}
