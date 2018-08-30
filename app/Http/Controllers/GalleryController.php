<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    //
    
    public function viewGallery()
    {
    	$picture = Gallery::all();

    	return view ('admin.view_gallery', compact('picture'));
    }
     public function addGallery()
    {
    	return view ('admin.add_gallery');
    }
    public function viewAlbumImage()
    {

    	return view ('admin.image.view_image');
    }
    public function addAlbumImage()
    {

    	return view ('admin.image.add_image');
    }

}
