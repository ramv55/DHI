<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiveyrlookbackController extends Controller
{
    public function index(){
      return View('5yrlookback');
    }

    public function fiveYrLookbackInfo(){
      return View('5yrlookbackinfo');
    }
}
