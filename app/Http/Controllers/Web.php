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
    public function setup(Request $request)
    {
        if (AdminConfigs::count() == 0){
            return view('setup');

        }
        return view('errors.access');
    }

    public function setup_post(Request $request)
    {
           if (AdminConfigs::count() == 0){
            $data = $request;
            AdminConfigs::insert([
                ['name' => 'group_name', 'config' =>  $request->group_name],
                ['name' => 'mosabeghe_name', 'config' =>  $request->mosabeghe_name],
                ['name' => 'welcome_text', 'config' =>  $request->welcome_text],
                ['name' => 'welcome_btn', 'config' =>  $request->welcome_btn],
                ['name' => 'off_start_text', 'config' =>  $request->off_start_text],
                ['name' => 'enable_start_title', 'config' =>  $request->enable_start_title],
                ['name' => 'enable_start_text', 'config' =>  $request->enable_start_text],
                ['name' => 'start_btn', 'config' =>  $request->start_btn],
                ['name' => 'admin_register', 'config' =>  1],
                ['name' => 'dor', 'config' =>  3],
                ['name' => 'current_dor', 'config' =>  0],
                ['name' => 'on_off', 'config' =>  0],
            ]);
            return redirect('/admin/register');
        }

    }

    public function welcome2()
    {
        return view('welcome2');
    }

    public function welcome3()
    {
        if (Auth::check()) {
            $start = AdminConfigs::where('name', 'start')->first();
            return view('welcome3', ['start' => $start->config]);
        } else {
            return redirect(route('welcome'));
        }

    }

    public function member_all()
    {
        $u_data = User::orderByDesc('n_true')->get();
        return view('member.all', compact('u_data'));

    }

    public function show_questions(Request $request)
    {
        if ($request->user()->random != null) {
            $qustions = $request->user()->random;
            $q = explode('.', $qustions);
            $new_qustions = explode('.', $qustions);
            unset($new_qustions[0]);
            $new_qustions = join('.', $new_qustions);
            User::find($request->user()->id)->update(['random' => $new_qustions]);

            $q = Questions::find($q[0]);
            return view('member.showQuestions', ['question' => $q]);
        } else {
            return view('member.end', ['user' => $request->user()]);
        }

    }

    public function check_questions(Request $request)
    {
        $true = Questions::find($request->id)->true;
        if ($request->gozine == $true) {
            $user = User::find($request->user()->id);
            $n_true = $user->n_true + 1;
            $n_false = $user->n_false;
            $score = ($n_true - ($n_false / 2)) * 10;
            User::find($request->user()->id)->update([
                'n_true' => $n_true,
                'score' => $score,
            ]);
            return view('member.result', ['question' => Questions::find($request->id), 'an' => $request->gozine, 'true' => 1, 'score' => $score]);

        } else {
            $user = User::find($request->user()->id);
            $n_true = $user->n_true;
            $n_false = $user->n_false + 1;
            $score = ($n_true - ($n_false / 2)) * 10;
            User::find($request->user()->id)->update([
                'n_false' => $n_false,
                'score' => $score,
            ]);

            return view('member.result', ['question' => Questions::find($request->id), 'an' => $request->gozine, 'true' => 0, 'score' => $score]);
        }


    }

    public function admin_login()
    {
        if (Auth::check()) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            $register = AdminConfigs::where('name', 'admin_register')->first();
            return view('admin.login', ['register' => $register->config]);
        }
    }

    public function admin_register()
    {
        if (AdminConfigs::where('name', 'admin_register')->first()->config) {
            return view('admin.register');
        } else {
            return view('admin.registerBlock');
        }


    }

    public function admin_register_pots(request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'number.unique' => ' نام کاربری تکراری است.'
        ]);

        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'random' => 0,
            'admin' => 1,
        ]);

        AdminConfigs::where('name', 'admin_register')->first()->update([
            'admin_register' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.dashboard'));
    }

    public function admin_login_pots(LoginRequest $request)
    {

        $number = $request->number;
        User::where('number', $number)->first();

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));

    }
}
