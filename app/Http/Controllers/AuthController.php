<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
    public function showRegisterForm()
{
    return view('auth.register');
}


    public function register(RegisterUserRequest $request) {

        $user = User::create($request->all());
        auth()->login($user);

        return redirect('/products')->with('success', 'Регистрация прошла успешно');
    }

    
    public function showLoginForm()
     {
     return view('auth.login');
     }
 

    public function login(Request $request) {
        $credentials = $request->validate([
            'login'=> 'required|string',
            'password'=> 'required|string'
        ]);

        if (auth()->attempt($credentials)) {
            return redirect('/products')->with('success', 'Успешный вход');
        } 
            return back()->withErrors([
                'login' => 'Неверный логин или пароль'
            ]);   
    }

    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Вы вышли из системы');
    }

}