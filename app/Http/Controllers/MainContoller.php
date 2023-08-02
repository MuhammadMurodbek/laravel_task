<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainContoller extends Controller
{
    public function main(){
        return redirect('dashboard');
    }
    public function dashboard(){
        $applications = Application::paginate(5);
        return view('dashboard')->with('applications',$applications);
    }
}