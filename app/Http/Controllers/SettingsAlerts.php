<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AlertSettingsModel;
use Input;
use Redirect;

class SettingsAlerts extends Controller
{
    public function index(){
      $alerts = AlertSettingsModel::where('mile_radius','!=','')->first();
      return view('settings_alert')
                ->with('alerts', $alerts);
    }

    protected function addUpdate(Request $request){
      $mile_radius = Input::get('mile_radius');
      $hail_size = Input::get('hail_size');
      $wind_speed = Input::get('wind_speed');

      $this->validate($request, array(
          'mile_radius' => 'required|numeric',
          'hail_size'   => 'required|numeric',
          'wind_speed'  =>  'required|numeric'
      ),
      array(
        'mile_radius.required'  =>  'Please enter Mile Radius.',
        'hail_size.required'    =>  'Please enter Hail Size.',
        'wind_speed.required'   =>  'Please enter Wind Speed.'
      )
      );


      $alert_models = (array)AlertSettingsModel::all();
      $alert_models = array_filter($alert_models);
      if(empty($alert_models))
      {
        $alerts = AlertSettingsModel::create(array(
                  'mile_radius'   =>  $mile_radius,
                  'hail_size'     =>  $hail_size,
                  'wind_speed'    =>  $wind_speed
        ));
        return back()->with('success','Alerts Added Successfully.');
      }else {
        $alerts = AlertSettingsModel::where('mile_radius','!=','')->update(array(
                  'mile_radius'   =>  $mile_radius,
                  'hail_size'     =>  $hail_size,
                  'wind_speed'    =>  $wind_speed
        ));
        return back()->with('success','Alerts Updated Successfully.');
      }



    }
}
