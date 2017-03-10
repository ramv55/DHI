<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsLogs extends Controller
{
    public function index(){
      return view('settings_logs');
    }
}
