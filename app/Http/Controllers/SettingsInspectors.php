<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Model\InspectorsSettingsModel;
use DB;
use Response;

class SettingsInspectors extends Controller
{
    public function index(){

      $search  = Input::get('search');
  		if($search != ""){
  			$searchcount = DB::table('inspectors')->where('email', '=', $search)->count();
  		}else {
  			$count = DB::table('inspectors')->count();
  		}

      $lists  = Input::get('lists');
  		if($lists == 'all'){
  			$showlists = $count;
  		}elseif ($lists != '') {
  			$showlists = $lists;
  		}else {
  			if($search != ""){
  					if($searchcount == 0){
  						$showlists = 10;
  					}else {
  						$showlists = $searchcount;
  					}

  			}else {
  				$showlists = 10;
  			}

  		}

      if($search != ""){

        $inspectors = DB::table('inspectors')
                  ->where('email', '=', $search)
                  ->orderBy('inspector_id', 'desc')
                  ->paginate($showlists);
      }else {
        $inspectors = DB::table('inspectors')
                  ->orderBy('inspector_id', 'desc')
                  ->paginate($showlists);
      }

      return view('settings_inspectors')
                ->with('inspectors', $inspectors)
                ->with('paginator', $inspectors);

    $results->appends(['search' => $search]);
    $results->appends(['lists' => $showlists]);
    }

    protected function store(Request $request){
      $firstname = Input::get('firstname');
      $lastname  = Input::get('lastname');
      $email     = Input::get('email');

      $this->validate($request, array(
          'firstname'   => 'required',
          'lastname'    => 'required',
          'email'       => 'required|email|unique:inspectors'
      ),array(
          'firstname.required'      =>    'Please enter First Name.',
          'lastname.required'       =>    'Please enter Last Name.',
          'email.required'          =>    'Please enter E-mail.'
      ));

      $addInspectors = InspectorsSettingsModel::create(array(
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'email'     => $email
      ));

      return back()->with('success','Inspector Added Successfully.');
    }

    protected function update(Request $request){

      $id        = Input::get('id');
      $firstname = Input::get('firstname');
      $lastname  = Input::get('lastname');
      $email     = Input::get('email');

      $this->validate($request, array(
          'firstname'   => 'required',
          'lastname'    => 'required',
          'email'       => 'required|email|unique:inspectors,email,'.$id.',inspector_id'
      ),array(
          'firstname.required'      =>    'Please enter First Name.',
          'lastname.required'       =>    'Please enter Last Name.',
          'email.required'          =>    'Please enter E-mail.'
      ));

      InspectorsSettingsModel::where('inspector_id', $id)->update(array(
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'email'     => $email
      ));

      return back()->with('success','Inspector Updated successfully.');
    }

    protected function delete($id){

      $deleteinspector = InspectorsSettingsModel::where('inspector_id', $id)->delete();

      if($deleteinspector){
        return back()->with('success','Inspector Deleted successfully.');
      }
    }
}
