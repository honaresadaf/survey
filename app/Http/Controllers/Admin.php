<?php

namespace App\Http\Controllers;

use App\Models\AdminConfigs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin2;
use Illuminate\Support\Facades\Auth;

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

    public function config_user() {
       $user = Auth::user();
      return view('admin.config.user' ,compact('user'));
    }

    public function config_user_post(Request $request) {
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'number' => ['required', 'string', 'lowercase', 'max:255', 'unique:'.User::class],
       ], [
           'number.unique' => ' نام کاربری تکراری است.'
       ]);
       User::find($request->user()->id)->update([
           'name' => $request->name,
           'number' => $request->number,
       ]);
       return redirect(route('config.user'));
    }

    public function config_show_admins() {
        $users = User::query();
        $users = $users->Paginate(20);
        return view('admin.config.admins', compact('users'));
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

}
