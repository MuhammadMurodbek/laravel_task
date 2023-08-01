<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request){

        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'public',$name
            );
        }

        Application::create([
            'user_id'=>auth()->user()->id,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$path ?? null,
        ]);

        return redirect()->back();
    }
}