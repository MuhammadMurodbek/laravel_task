<?php

namespace App\Http\Controllers;

use App\Events\ClientVisit;
use App\Events\PostCreated;
use App\Http\Requests\ApplicationRequest;
use App\Jobs\ApplicationPodcast;
use App\Mail\MailSend;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request){

        $post = Application::whereDate('created_at',  Carbon::today())->first();
    
        if ($post) return redirect()->back()->with('error',' You can create only 1 post in a day. Please try tomorrow!');
        
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'public/files',$name
            );
        }

       $application = Application::create([
            'user_id'=>auth()->user()->id,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'file_url'=>$path ?? null,
        ]);

        PostCreated::dispatch($application);
        ClientVisit::dispatch($application);
        ApplicationPodcast::dispatch($application);
        Mail::to($request->user())->later(now()->addMilliseconds(200),(new MailSend($application))->onQueue('mailable'));
        
        return redirect()->back();
    }
}