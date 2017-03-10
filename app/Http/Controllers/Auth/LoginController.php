<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function showLogin(){
      return view('login');
    }

    public function doLogin(Request $request){
  		$userdata = array(
  			'email'     => Input::get('email'),
  			'password'  => Input::get('password')
  		);

      $this->validate($request, array(
        'email' => 'required|email',
        'password' => 'required|min:5|max:20'
      ));
  		if (Auth::attempt($userdata)) {
        if (Auth::check()) {
              User::where('user_id', Auth::id())->update(
                array(
                  'last_login_at' => Date('Y-m-d H:i:s')
                )
              );
              // Authentication passed...
              return redirect()->intended('dashboard');
            }else{
              return back()->with('errors','Authentication Failed.');

            }
          }else{
            return back()->with('errors','Invalid Username / Password.');
  			//return redirect()->intended('login');
  		}
  	}
}
