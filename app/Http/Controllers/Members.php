<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class Members extends Controller
{
    public function all() {
        return view('admin.members.all' , [
            'u_data' => User::orderByDesc('n_true')->get()->except([1]),
        ]);
    }
}
