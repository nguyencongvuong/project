<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index(){
    	if(Auth::check()){
    		return view('backend.index');
    	}
    }
}
