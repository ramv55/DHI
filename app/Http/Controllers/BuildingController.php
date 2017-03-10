<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BuildingModel;
use Response;
use DB;
use Input;

class BuildingController extends Controller
{

    protected function add(Request $request){
      $build_prop_id          =   Input::get('build_prop_id');
      $building_address       =   Input::get('building_address');
      $building_address1      =   Input::get('building_address1');
      $build_city             =   Input::get('build_city');
      $build_state            =   Input::get('build_state');
      $build_zipcode          =   Input::get('build_zipcode');

      $roof_type              =   Input::get('roof_type');
      $building_size          =   Input::get('building_size');


      $address = $building_address.'builds'.$building_address1;

      BuildingModel::create(array(
        'property_id'       =>  $build_prop_id,
				'roof_type'         =>  $roof_type,
				'building_size'     =>  $building_size,
				'address'           =>  $address,
				'city'              =>  $build_city,
				'state'             =>  $build_state,
				'zipcode'           =>  $build_zipcode
      ));

      return back()->with('success','Building Details Added Successfully.');
    }
}
