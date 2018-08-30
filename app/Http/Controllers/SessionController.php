<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function create()
    {
    	if( auth()->attempt(request(['email','password'])))
    	{
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
