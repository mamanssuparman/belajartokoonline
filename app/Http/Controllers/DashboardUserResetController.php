<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserResetController extends Controller
{
    public function reset(Request $request)
    {
        $request->validate([
            'id'            => 'required'
        ]);
        $resetpassword = [
            'password'      => bcrypt('123456')
        ];
        User::where('id', $request->id)->update($resetpassword);
        return redirect('/dashboard/user')->with('success', 'Data user berhasil di reset password.!');
    }
}
