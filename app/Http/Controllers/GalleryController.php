<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Image;
use DB;
use Alert;

class GalleryController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewGallery()
    {
    	$picture = Gallery::all();

    	return view ('admin.view_gallery', compact('picture'));
    }
    public function addGallery()
    {
    	
       $img = Gallery::all();
       return view('admin.add_gallery', compact("img"));
   }
   public function viewAlbumImage($album_name)
   {

    $img = Gallery::where('id','=',$album_name)->get();

    return view ('admin.image.view_image',compact("img"));
}
public function addAlbumImage($album_name)
{


 return view ('admin.image.add_image',compact("album_name"));
}
public function addAlbum()
{
    $this->validate(request(),[
        'album_name' => 'required',
        'album_cover' => 'required',
        'images' => 'required',
        'description' => 'required',
        'album_type' => 'required',
    ]);
    $images= array();
    if($files=request()->file('images'))
    {
        foreach($files as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('public/upload/gallery/'.request("album_name").'', $name);
            $path = public_path('storage/upload/gallery/'.request("album_name").'/'.$name);
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);

            $images[]=$name;
        }
    }
    if(request()->hasFile('album_cover'))
    {
        request('album_cover')->storeAs('public/upload/gallery/covers/'.request("album_name").'', request('album_cover')->getClientOriginalName());
        $pathway = public_path('storage/upload/gallery/covers/'.request("album_name").'/'.request('album_cover')->getClientOriginalName());
        $cover = Image::make($pathway)->resize(720,720,function($constraint){
            $constraint->aspectRatio();
        });
        $cover->save($pathway);
        
        Gallery::create([
            'image' => implode(",",$images),
            'album_name' => request('album_name'),
            'cover_image' => request('album_cover')->getClientOriginalName(),
            'description' => request('description'),
            'album_type' => request('album_type'),
        ]);

    }
    Alert::success('The album is succesfully created','Album Created')->persistent('Close');
    return view('admin.add_gallery');
}

public function editAlbum($album_name)
{

    $album = Gallery::where('id','=',$album_name)->get();

    return view('admin.edit_gallery', compact("album"));

}
public function updateAlbum($album_name)
{
    $this->validate(request(),[
        'album_name' => 'required',
        'description' => 'required',
    ]);
    Gallery::where('id','=',$album_name)->update([
        'album_name' => request('album_name'),
        'description' => request('description'),

    ]);
    if(request()->hasFile('album_cover'))
    {
        request('album_cover')->storeAs('public/upload/gallery/covers/'.request("album_name").'', request('album_cover')->getClientOriginalName());
        $pathway = public_path('storage/upload/gallery/covers/'.request("album_name").'/'.request('album_cover')->getClientOriginalName());
        $cover = Image::make($pathway)->resize(720,720,function($constraint){
            $constraint->aspectRatio();
        });
        $cover->save($pathway);

        Gallery::where('id','=',$album_name)->update([
            'cover_image' => request('album_cover')->getClientOriginalName(),
        ]);
    }


    $picture = Gallery::all();
    Alert::success('The album is succesfully updated','Album Updated')->persistent('Close');
    return view ('admin.view_gallery', compact('picture'));

}
public function addImage($album_name)
{
    $this->validate(request(),[
        'images' => 'required',
    ]);

    $album=Gallery::where('id','=',$album_name)->get();
    foreach ($album as  $value) {
        $image_add = $value->image;
        $val=$value->album_name;
    }


    if($files=request()->file('images'))
    {

        $images= array();
        foreach($files as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('public/upload/gallery/'.$val.'', $name);
            $path = public_path('storage/upload/gallery/'.$val.'/'.$name);
            $img = Image::make($path)->resize(720,720,function($constraint){
                $constraint->aspectRatio();
            });
            $img->save($path);

            $images[]=$name;

            $d=Gallery::updateOrCreate(['id' => $album_name],[
                'image' => implode(",",$images).",".$image_add]);


        }
    }


    $img = Gallery::where('id','=',$album_name)->get();
    Alert::success('The image(s) is succesfully added','Image(s) Added')->persistent('Close');
    return view ('admin.image.view_image',compact("img"));

}
public function destroy()
{

    Gallery::find(request('deleted_album'))->delete();

    $picture = Gallery::all();
    Alert::success('The album is succesfully deleted','Album Deleted')->persistent('Close');
    return view ('admin.view_gallery', compact('picture'));
}
public function retrieve($album_name)
{
    Gallery::withTrashed()->where('id',$album_name)->restore();

    $trashPool=DB::table('Pools')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashRoom=DB::table('Rooms')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashStaff=DB::table('Users')->where('deleted_at','!=','0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashEvent=DB::table('Events')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    $trashAlbum=DB::table('Galleries')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();

    $trashReserve=DB::table('reservations')->where('deleted_at','!=' ,'0000-00-00 00:00:00')->Orderby('deleted_at','asc')->get();
    Alert::success('The album is succesfully retrieved','Album Retrieved')->persistent('Close');
        return view ('admin.logs',compact('trashPool','trashRoom','trashStaff','trashEvent','trashAlbum','trashReserve'));
}
public function delete($album_name)
{

    $image=Gallery::where('id','=',$album_name)->get();
    $photos=array();
    foreach ($image as $img) {


        foreach(explode(',',$img->image) as $image)
        {
            if($image==request('deleted_image'))
            {
                $image="";
            }
            else
            {
                $photos[]=$image;
            }
        }
    }

  $d=Gallery::where('id','=',$album_name)->update([
        'image' => implode(',', $photos),
    ]);

    $picture = Gallery::all();
    Alert::success('The image is succesfully deleted','Image Deleted')->persistent('Close');
    return view ('admin.view_gallery', compact('picture'));
}
}
