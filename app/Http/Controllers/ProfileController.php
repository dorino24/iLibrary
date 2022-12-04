<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
 public function index(){
   if(auth()->user()->role == 1) {
   return view('profile/profile',[
      'layout'=>'template'
    ]);
 }
 else{
      return view('profile/profile',[
      'layout'=>'templateAdmin'
      ]);
   }
   
 }
}
    //
