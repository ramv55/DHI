<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LogosSettingsModel;
use Input;
use DB;

class SettingsLogo extends Controller
{
    public function index(){
      $logos = DB::table('logos')
                ->orderBy('logo_id', 'desc')->get();
      return view('settings_logo')
              ->with('results', $logos);
    }

    public function store(Request $request){
      $file = $request -> file('image');

      // move uploaded File
      $destinationPath = 'uploads/logos';
      $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ]);

      $imageName = time().'.'.$file->getClientOriginalName();

      $file->move($destinationPath,$imageName);

      $upload_img = LogosSettingsModel::create(array(
          'name' => Input::get('name'),
          'logo_img' => $imageName
      ));

      return back()->with('success','Logo Uploaded successfully.');
    }

    protected function update(Request $request){
      $id = Input::get('id');

      $file = $request -> file('images');
      // move uploaded File
      $destinationPath = 'uploads';
      if(empty($file)){
        $this->validate($request, array(
          'names' => 'required',
        ));
        $upload_img = LogosSettingsModel::where('logo_id', $id)->update(array(
            'name' => Input::get('names')
        ));
      }else {

            $this->validate($request, array(
              'names' => 'required',
              'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ));

            //************ Delete existing logo starts here ***************
            $image = \DB::table('logos')->where('logo_id', $id)->first();
              $existing_file = $image->logo_img;
              $filename = public_path().'/uploads/'.$existing_file;
              \File::delete($filename);
            //*********** Delete existing logo ends here **************
            $imageName = time().'.'.$file->getClientOriginalName();

            $file->move($destinationPath,$imageName);

            $upload_img = LogosSettingsModel::where('logo_id', $id)->update(array(
                'name' => Input::get('names'),
                'logo_img' => $imageName
            ));
        }


      return back()->with('success','Logo Updated successfully.');

    }

    protected function delete($id){
      $delete = LogosSettingsModel::where('logo_id', $id)->delete();
      if($delete){
        return back()->with('success','Logo Deleted successfully.');
      }
    }
}
