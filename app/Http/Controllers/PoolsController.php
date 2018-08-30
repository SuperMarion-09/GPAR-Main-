<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pools;

class PoolsController extends Controller
{
    //
   
    public function viewPool()
    {
    	$pool = Pools::all();




    	return view ('admin.view_pools', compact('pool'));
    }
     public function addPool()
    {
    	return view ('admin.add_pools');
    }

     public function store()
    {
    	$pool = new Pools;

    	$pool->price_per_head = request('addPricePerHead');
    	$pool->minimum_pax=request('addPoolPax');
    	$pool->pool_description=request('description');

    	$pool->save();


    	return redirect('/admin/pool/add_pools');
    }

}
