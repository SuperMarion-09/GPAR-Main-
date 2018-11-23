<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class SessionController extends Controller
{
    //
    public function create()
    {
    	if( auth()->attempt(request(['email','password'])))
    	{
            Alert::success('Sucessfully Login! Welcome Back!','Login')->persistent('Close');
    		return redirect()->home();

    	}

    	return back();
    }
    public function destroy()
    {
    	auth()->logout();

    	return view ('admin.login');
    }
}
