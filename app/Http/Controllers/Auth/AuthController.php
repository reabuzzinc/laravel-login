<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * 　@return View
     */

    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     *  @param App\Http\Requests\LoginFormRequest;
     */

    public function login(LoginFormRequest $request) 
    {
      $credentials = $request->only('email, password');

      if (Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect('home')->with('login_success','ログイン成功しました！');
      }

      return back()->withErrors([
        'login_error' => "メールアドレスかパスワードが間違っています。",
      ]);
  
    }
}
