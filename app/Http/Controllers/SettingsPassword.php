<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Hash;
use DB;
use Input;
class SettingsPassword extends Controller
{
    public function index(){
      return View('passwords');
    }

    protected function update(Request $request){
      $password = Input::get('password');
      $retype_pwd = Input::get('retype_pwd');

      $this->validate($request, array(
          'password' => 'required|min:5|max:20',
          'retype_pwd' => 'min:5|max:20|same:password'
      ));

      $update = User::where('role', 0)->update(array(
        'password'  => Hash::make($password)
      ));

        return back()->with('success','Password Updated successfully.');

    }
}
