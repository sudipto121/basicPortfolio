<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $table = 'galleries';
    //List Gallery
    public function index(){
        //Get All Gallery
        $galleries = DB::table($this->table)->get();

        //Render
        return view('gallery.index',compact('galleries'));
    }
    //Show create form
    public function create(){
        //Check Logged In
        if (!Auth::check()){
            return \Redirect::route('gallery.index');
        }
        return view('gallery.create');
    }
    //Store Gallery
    public function store(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        //Check Image Upload
        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'), $cover_image_filename);
        }
        else{
            $cover_image_filename = 'noImage.jpg';
        }
        //Insert Image
        DB::table($this->table)->insert([
            'name' => $name,
            'description' => $description,
            'cover_image' => $cover_image_filename,
            'owner_id' => $owner_id,
        ]);
        //Set Message
        \Session::flash('message', 'Gallery Created');
        //Redirect
        return \Redirect::route('gallery.index');
    }
    //Show Gallery Photo
    public function show($id){
        //Get gallery
        $gallery = DB::table($this->table)->where('id',$id)->first();
        //Get Portfolio
        $photos = DB::table('photos')->where('gallery_id',$id)->get();
        //Render
        return view('gallery.show',compact('gallery','photos'));
    }
    //Edit Gallery
    public function edit($id){
        $gallery = DB::table($this->table)->where('id',$id)->first();
        //Render
        return view('gallery.edit',compact('gallery'));
    }
    //Update Gallery
    public function updateData(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1;

        //Check Image Update
        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();
            $cover_image->move(public_path('images'), $cover_image_filename);
            //Update Image
            DB::table($this->table)->where('id',$id)->update([
                'name' => $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id' => $owner_id,
            ]);
        }
        else{
            DB::table($this->table)->where('id',$id)->update([
                'name' => $name,
                'description' => $description,
                'owner_id' => $owner_id,
            ]);
        }
        //Set Message
        \Session::flash('message', 'Gallery Updated Successfully');
        //Redirect
        return \Redirect::route('gallery.index');
    }
    //Delete Gallery
    public function destroy($id){
        $gallery = DB::table($this->table)->where('id',$id)->delete();
        //Set Message
        \Session::flash('message', 'Gallery deleted successfully');
        //Render
        return redirect()->back();
    }
}
