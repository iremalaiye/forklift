<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AjaxController extends Controller
{
    public function logout(Request $request){
        // Log out the authenticated user
       Auth::logout();
        // Redirect to the homepage route
       return redirect()->route('anasayfa');
    }
}
