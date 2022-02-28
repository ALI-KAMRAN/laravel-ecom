<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;  

class adminController extends Controller
{

    public function adminLogin(){
        return view('adminSide.adminLogin');
    }

    public function adminDashboard(){
        return view('adminSide.masterFiles.dashboard');
    }
    public function adminLogout(){
        Auth::logout();
        return redirect()->back();
    }

    public function userData(){
      $users = User::get();
      return view('adminSide.userData',compact('users'));

    }


    public function userDelete(Request $request){

        $id = $request->id;
        $user = User::find($id);
        $user->delete();
    }
}
