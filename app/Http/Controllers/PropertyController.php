<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\PropertyModel;
use Response;
use DB;
use Input;

class PropertyController extends Controller
{
    public function index(){
      return View('properties');
    }

    public function addProperty(){
      return View('addproperty');
    }

    protected function add(Request $request){
      $property_name          =   Input::get('property_name');
      $property_contact       =   Input::get('property_contact');
      $property_phone         =   Input::get('property_phone');
      $property_email         =   Input::get('property_email');
      $property_address       =   Input::get('property_address');
      $property_address1       =   Input::get('property_address1');
      $prop_city              =   Input::get('prop_city');
      $prop_state             =   Input::get('prop_state');
      $prop_zipcode           =   Input::get('prop_zipcode');

      $prop_customer          =   Input::get('prop_customer');
      $small_latitude         =   Input::get('small_latitude');
      $small_longitude        =   Input::get('small_longitude');
      $large_latitude         =   Input::get('large_latitude');
      $large_longitude        =   Input::get('large_longitude');
      $total_buildings        =   Input::get('total_buildings');
      $small                  =   Input::get('small');
      $medium                 =   Input::get('medium');
      $large                  =   Input::get('large');
      $id                     =   Input::get('id');

      $file = $request -> file('image');

      // move uploaded File
      $destinationPath = 'uploads/properties';
      $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

      $imageName = time().'.'.$file->getClientOriginalName();

      $file->move($destinationPath,$imageName);

      $address = $property_address.'prop'.$property_address1;
      $small_coordinate = $small_latitude.' '.$small_longitude;
      $large_coordinate = $large_latitude.' '.$large_longitude;

      PropertyModel::create(array(
        'property_name'       =>  $property_name,
				'company_id'          =>  $id,
				'contact_name'        =>  $property_contact,
				'phone'               =>  $property_phone,
				'email'               =>  $property_email,
				'address'             =>  $address,
				'city'                =>  $prop_city,
				'state'               =>  $prop_state,
				'zipcode'             =>  $prop_zipcode,
				'prop_img'            =>  $imageName,
				'small_coordinate'    =>  $small_coordinate,
				'large_coordinate'    =>  $large_coordinate,
				'total_buildings'     =>  $total_buildings,
				'small'               =>  $small,
				'medium'              =>  $medium,
				'large'               =>  $large,
				'customer'            =>  $prop_customer
      ));

      return back()->with('success','Property Added Successfully.');
    }

    protected function update(Request $request){
      $property_name          =   Input::get('property_name');
      $property_contact       =   Input::get('property_contact');
      $property_phone         =   Input::get('property_phone');
      $property_email         =   Input::get('property_email');
      $property_address       =   Input::get('property_address');
      $property_address1       =   Input::get('property_address1');
      $prop_city              =   Input::get('prop_city');
      $prop_state             =   Input::get('prop_state');
      $prop_zipcode           =   Input::get('prop_zipcode');

      $prop_customer          =   Input::get('prop_customer');
      $small_latitude         =   Input::get('small_latitude');
      $small_longitude        =   Input::get('small_longitude');
      $large_latitude         =   Input::get('large_latitude');
      $large_longitude        =   Input::get('large_longitude');
      $total_buildings        =   Input::get('total_buildings');
      $small                  =   Input::get('small');
      $medium                 =   Input::get('medium');
      $large                  =   Input::get('large');
      $id                     =   Input::get('id');

      $file = $request -> file('image');

      // move uploaded File
      $destinationPath = 'uploads/properties';
      $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);
echo $file->getClientOriginalName();exit;
      $imageName = time().'.'.$file->getClientOriginalName();

      $file->move($destinationPath,$imageName);

      $address = $property_address.'prop'.$property_address1;
      $small_coordinate = $small_latitude.' '.$small_longitude;
      $large_coordinate = $large_latitude.' '.$large_longitude;

      PropertyModel::where('property_id', $id)->update(array(
        'property_name'       =>  $property_name,
				'contact_name'        =>  $property_contact,
				'phone'               =>  $property_phone,
				'email'               =>  $property_email,
				'address'             =>  $address,
				'city'                =>  $prop_city,
				'state'               =>  $prop_state,
				'zipcode'             =>  $prop_zipcode,
				'prop_img'            =>  $imageName,
				'small_coordinate'    =>  $small_coordinate,
				'large_coordinate'    =>  $large_coordinate,
				'total_buildings'     =>  $total_buildings,
				'small'               =>  $small,
				'medium'              =>  $medium,
				'large'               =>  $large,
				'customer'            =>  $prop_customer
      ));

      return back()->with('success','Property Updated Successfully.');
    }
}
