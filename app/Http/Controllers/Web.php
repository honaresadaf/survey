<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\AdminConfigs;
use App\Models\User;
use App\Models\Questions;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Web extends Controller
{
    public function member_all() {
        return view('member.all' , [
            'u_data' => User::orderByDesc('n_true')->get()->except([1]),
        ]);

    }

    public function show_questions() {
        $qustions = Questions::all();
        $qustions2 = Questions::all()->pluck('id')->shuffle()->implode('.');
        dd($qustions2);
        return view('member.showQuestions' , ['questions' => Questions::all()]);
    }

    public function check_questions(Request $request) {
        dd($request);
        return view('member.result' , ['questions' => Questions::all()]);

    }

    public function admin_login() {
        if (Auth::check()) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            $register = AdminConfigs::where('name' , 'adminRegister')->first();
            return view('admin.login' , ['register' => $register->config]);
        }
    }

    public function admin_register() {
        if (AdminConfigs::where('name' , 'adminRegister')->first()->config) {
            return view('admin.register');
        } else {
            return view('admin.registerBlock');
        }


    }

    public function admin_register_pots(request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ] , [
            'number.unique' => ' نام کاربری تکراری است.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'random' => 0,
            'admin' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.dashboard'));
    }

    public function admin_login_pots(LoginRequest $request){

        $number = $request->number;
        User::where('number',$number)->first();

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));

    }
}
