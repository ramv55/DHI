<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use Hash;
use DB;
use Input;

class SettingsUsers extends Controller
{
    public function index(){
      $count = DB::table('users')->count();

      $lists  = Input::get('lists');
  		if($lists == 'all'){
  			$showlists = $count;
  		}elseif ($lists != '') {
  			$showlists = $lists;
  		}else {

  				$showlists = 10;


  		}
      $users = DB::table('users')
                ->orderBy('user_id', 'desc')
                ->paginate($showlists);

      return view('settings_users')
                ->with('users', $users)
                ->with('paginator', $users);
    }

    public function add(Request $request){
      $firstname = Input::get('firstname');
      $lastname  = Input::get('lastname');
      $email     = Input::get('email');
      $role      = Input::get('user_role');
      $password  = Input::get('password');

      $this->validate($request, array(
          'firstname'   => 'required',
          'lastname'    => 'required',
          'email'       => 'required|email|unique:users',
          'user_role'   => 'required',
          'password'  => 'required|min:5|max:20'
      ),array(
          'firstname.required'      =>    'Please enter First Name.',
          'lastname.required'       =>    'Please enter Last Name.',
          'email.required'          =>    'Please enter E-mail.',
          'user_role.required'      =>    'Please select User Role.',
          'password.required'       =>    'Please enter Password.',
          'password.min'            =>    'Password must be at least 5 characters.',
          'password.mx'             =>     'Password may not be greater than 20 characters.'
      ));
      $user = User::create(array(
          'firstname' => $firstname,
          'lastname' => $lastname,
          'email' => $email,
          'role' => $role,
          'password' => Hash::make($password)
      ));


        return back()->with('success','User Added successfully.');
    }

    public function update(Request $request){
      $id = Input::get('user_id');
      $firstname = Input::get('firstname');
      $lastname  = Input::get('lastname');
      $email     = Input::get('email');
      $role      = Input::get('user_role');
      $password  = Input::get('password');

      $this->validate($request, array(
          'firstname'   => 'required',
          'lastname'    => 'required',
          'email'       => 'required|email|unique:users,email,'.$id.',user_id',
          'user_role'   => 'required'
      ),array(
          'firstname.required'      =>    'Please enter First Name.',
          'lastname.required'       =>    'Please enter Last Name.',
          'email.required'          =>    'Please enter E-mail.',
          'user_role.required'      =>    'Please select User Role.'
      ));

      if(empty($password)){
        $updateuser = User::where('user_id', $id)->update(array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'role' => $role
        ));
    }else {
      $updateuser = User::where('user_id', $id)->update(array(
          'firstname' => $firstname,
          'lastname' => $lastname,
          'email' => $email,
          'role' => $role,
          'password' => Hash::make($password)
      ));
    }


        return back()->with('success','User Updated successfully.');

    }

    protected function removeUser($id){

      $deleteuser = User::where('user_id', $id)->delete();

      if($deleteuser){
          return back()->with('success','User Deleted successfully.');
      }
    }


}
