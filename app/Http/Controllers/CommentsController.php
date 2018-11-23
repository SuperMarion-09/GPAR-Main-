<?php

namespace App\Http\Controllers;

use App\Comments;
use Alert;
use Illuminate\Http\Request;
use Redirect;

class CommentsController extends Controller
{
    public function add_comment()
    {
    	$this->validate(request(),[
    		'email' => 'required|email',
    		'message' => 'required'

    	]);

    	Comments::create([
    		'name' => request('uname'),
    		'email' => request('email'),
    		'comment' => request('message'),
    	]);


        Alert::success('Thank you for your feedback','Feedback Sent')->persistent('Close');
    	return view('customer.contact_us');
    }
    public function delete_comment()
    {
       
        Comments::find(request('deleted_comment'))->forceDelete();
        Alert::success('Comment(s) succesfully deleted','Comment Deleted')->persistent('Close');
        return redirect::route('home');
    }

}
