<?php

namespace App\Http\Controllers;

use App\Models\AdminConfigs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Admin extends Controller
{
   public function index(){
       return view('admin.index');
   }

    public function config_question() {
        $dor = AdminConfigs::where('name', 'dor')->first();
        return view('admin.config.question' , ['dor' => $dor->config]);
    }

    public function config_question_update(Request $request) {

        $vali = $request->validate([
            'dor' => 'required',
        ]);

        if(AdminConfigs::where('name', 'dor')->update(['config' => request('dor')])) {
            AdminConfigs::where('name', 'current_dor')->update(['config' => '0']);
            return view('admin.config.question', ['dor' => request('dor')]);
        } else {
            AdminConfigs::updateOrCreate(
                ['name' => 'dor', 'config' => request('dor')]
            );
            return view('admin.config.question' , ['dor' => request('dor')]);
        }

    }

    public function config_user(Request $request) {
      return view('admin.config.user' ,[
          'user' => User::findOrFail($request->user),
      ] );
    }

    public function config_user_post(Request $request) {
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'number' => ['required', 'string', 'lowercase', 'max:255', Rule::unique('Users')->ignore($request->id)],
       ], [
           'number.unique' => ' نام کاربری تکراری است.'
       ]);
       User::find($request->id)->update([
           'name' => $request->name,
           'number' => $request->number,
       ]);
       return redirect(route('config.user' , ['user' => $request->id]))->with('status' , true);
    }

    public function config_show_admins() {
        $users = User::query();
        $users = $users->Paginate(20);
        return view('admin.config.admins', compact('users'));
    }

    public function delete_admin(User $user) {
        $user->delete();
        return redirect(route('config.admins'))->with('status' , true);
    }

    public function all_member() {
        return view('admin.members.all' , [
            'u_data' => User::orderByDesc('n_true')->get(),
        ]);
    }

    public function member_edit(Request $request)
    {
        return view('admin.members.edit', [
            'member' => User::findOrFail($request->user),
        ]);
    }

    public function member_edit_post(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
        ], [
            'number.unique' => ' شماره تماس تکراری است.'
        ]);
        User::find($request->id)->update([
            'name' => $request->name,
            'number' => $request->number,
        ]);
        return redirect(route('member.edit', ['user' => $request->id]));


    }

    public function config_all() {
       return view('admin.config.setup');
    }

    public function config_all_update(Request $request) {
        if ($request->on_off == null) {
            $on_off = 0;
        } else {
            $on_off = 1;
        }
        if ($request->admin_register == null) {
            $admin_register = 0;
        } else {
            $admin_register = 1;
        }
       AdminConfigs::where('name' , 'group_name')->first()->update(['config' => $request->group_name]);
       AdminConfigs::where('name' , 'mosabeghe_name')->first()->update(['config' => $request->mosabeghe_name]);
       AdminConfigs::where('name' , 'welcome_text')->first()->update(['config' => $request->welcome_text]);
       AdminConfigs::where('name' , 'welcome_btn')->first()->update(['config' => $request->welcome_btn]);
       AdminConfigs::where('name' , 'off_start_text')->first()->update(['config' => $request->off_start_text]);
       AdminConfigs::where('name' , 'enable_start_title')->first()->update(['config' => $request->enable_start_title]);
       AdminConfigs::where('name' , 'enable_start_text')->first()->update(['config' => $request->enable_start_text]);
       AdminConfigs::where('name' , 'start_btn')->first()->update(['config' => $request->start_btn]);
       AdminConfigs::where('name' , 'on_off')->first()->update(['config' => $on_off]);
       AdminConfigs::where('name' , 'admin_register')->first()->update(['config' => $admin_register]);

        return redirect(route('config.all'));
    }

}
