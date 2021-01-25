<?php

namespace App\Http\Controllers;

use App\Events\chatEvent ;
use Illuminate\Http\Request;
use App\User ;
use Illuminate\Support\Facades\Auth ;

class chatController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chat(){
        if (Auth::check()) {
            $users = User::all();
        }
        return view('chat', compact('users'));
    }

    public function chat2(){
        if (Auth::check()) {
            $users = User::all();
        }
        return view('chat2', compact('users'));
    }

    public function send(request $request){
        $user = User::find(Auth::id());
        $this->saveToSession($request);
        event(new chatEvent($request->message,$user));

    }

    public function saveToSession(request $request){
      session()->put('chat',$request->chat);

    }

    public function getOldMessages(){

        return session('chat') ;
      }

      public function deleteSession(){

        session()->forget('chat') ;
      }

      public function allusers(){
        return  User::all();
      }


    // public function send(){
    //     $message = 'hello world';
    //     $user = User::find(Auth::id());
    //     event(new chatEvent($message,$user));

    // }



}
