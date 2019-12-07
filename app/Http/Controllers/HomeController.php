<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function admin(){
        return view('home_Admin');
    }


    public function prof(){
        $user=\Auth::user();
        $elements=$user->elements;
        $arr=array('elements'=>$elements);
        return view('home_Prof',$arr);
    }


    public function chef_fil(){
        $user=\Auth::user();
        $elements=$user->elements;
        $arr=array('elements'=>$elements);
        return view('home_Chef_fil',$arr);
    }

    
    public function chef_dep(){
        $user=\Auth::user();
        $elements=$user->elements;
        $arr=array('elements'=>$elements);
        return view('home_Chef_dep',$arr);
    }

    public function index()
    {
        $user=\Auth::user();
        $elements=$user->elements;
        $arr=array('elements'=>$elements);
        return view('home',$arr);
    }

}
