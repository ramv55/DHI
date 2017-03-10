<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CompanyModel;
use Response;
use DB;
use Input;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(){

      $search  = Input::get('search');
  		if($search != ""){
  			$searchcount = DB::table('company_details')->where('company_name', '=', $search)->count();
  		}else {
  			$count = DB::table('company_details')->count();
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

  					$company_list = DB::table('company_details')
  										->where('company_name', '=', $search)
  										->orderBy('company_id', 'desc')
  										->paginate($showlists);
  				}else {
  					$company_list = DB::table('company_details')
  										->orderBy('company_id', 'desc')
  										->paginate($showlists);
  				}
      return View('companies')
              ->with('companies', $company_list)
              ->with('paginator', $company_list);
    }

    public function addCompany(){
      return View('addcompany');
    }

    public function store(Request $request){
      $company_name     = Input::get('company_name');
      $comp_customer    = Input::get('comp_customer');
      $contact_name     = Input::get('contact_name');
      $company_phone    = Input::get('company_phone');
      $company_email    = Input::get('company_email');
      $company_address1 = Input::get('company_address1');
      $company_address2 = Input::get('company_address2');
      $city             = Input::get('city');
      $state            = Input::get('state');
      $zip              = Input::get('zip');
      $mile_radius      = Input::get('mile_radius');
      $hail_size        = Input::get('hail_size');
      $wind_size        = Input::get('wind_size');

      $this->validate($request, array(
        'company_name'      =>  'required',
        'comp_customer'     =>  'required',
        'contact_name'      =>  'required',
        'company_phone'     =>  'required',
        'company_email'     =>  'required',
        'company_address1'  =>  'required',
        'city'              =>  'required',
        'state'             =>  'required',
        'zip'               =>  'required',
        'mile_radius'       =>  'required',
        'hail_size'         =>  'required',
        'wind_size'         =>  'required'
      ));
      $address = $company_address1.'comp'.$company_address2;

      $id = DB::table('company_details')->insertGetId(array(
        'company_name'      =>  $company_name,
        'customer'          =>  $comp_customer,
        'contact_name'      =>  $contact_name,
        'phone'             =>  $company_phone,
        'email'             =>  $company_email,
        'address'           =>  $address,
        'city'              =>  $city,
        'state'             =>  $state,
        'zipcode'           =>  $zip,
        'min_radius'        =>  $mile_radius,
        'min_hail_size'     =>  $hail_size,
        'min_wind_size'     =>  $wind_size
      ));

      return redirect('editcompany/'.$id);
    }

    protected function edit($id){
      $company_list = CompanyModel::where('company_id', '=', $id)->first();
      return View('editcompany')
                ->with('getcompany', $company_list);
    }

    public function update(Request $request){
      $company_name     = Input::get('company_name');
      $comp_customer    = Input::get('comp_customer');
      $contact_name     = Input::get('contact_name');
      $company_phone    = Input::get('company_phone');
      $company_email    = Input::get('company_email');
      $company_address1 = Input::get('company_address1');
      $company_address2 = Input::get('company_address2');
      $city             = Input::get('city');
      $state            = Input::get('state');
      $zip              = Input::get('zip');
      $mile_radius      = Input::get('mile_radius');
      $hail_size        = Input::get('hail_size');
      $wind_size        = Input::get('wind_size');
      $id               = Input::get('id');

      $this->validate($request, array(
        'company_name'      =>  'required',
        'comp_customer'     =>  'required',
        'contact_name'      =>  'required',
        'company_phone'     =>  'required',
        'company_email'     =>  'required',
        'company_address1'  =>  'required',
        'city'              =>  'required',
        'state'             =>  'required',
        'zip'               =>  'required',
        'mile_radius'       =>  'required',
        'hail_size'         =>  'required',
        'wind_size'         =>  'required'
      ));
      $address = $company_address1.'comp'.$company_address2;

      $update = CompanyModel::where('company_id', '=', $id)->update(array(
        'company_name'      =>  $company_name,
        'customer'          =>  $comp_customer,
        'contact_name'      =>  $contact_name,
        'phone'             =>  $company_phone,
        'email'             =>  $company_email,
        'address'           =>  $address,
        'city'              =>  $city,
        'state'             =>  $state,
        'zipcode'           =>  $zip,
        'min_radius'        =>  $mile_radius,
        'min_hail_size'     =>  $hail_size,
        'min_wind_size'     =>  $wind_size
      ));

      if($update){
        return redirect('companies');
      }

    }

    protected function delete(){
      $id   =   Input::get('id');
      $deletecompany = CompanyModel::where('company_id', $id)->delete();
      if($deletecompany){
        return Response::json(array('status' => 'success'));
      }else {
        return Response::json(array('status' => 'fail'));
      }
    }
}
