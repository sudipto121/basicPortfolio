<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    private $table = 'photos';
    //Show create form
    public function create($gallery_id){
        //Check Logged In
        if (!Auth::check()){
            return \Redirect::route('gallery.index');
        }
        return view('portfolio.create',compact('gallery_id'));
    }
    //Store Photo
    public function store(Request $request){
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;


        //Check Image Upload
        if($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        }
        else{
            $cover_image_filename = 'noImage.jpg';
        }
        //Insert Image
        DB::table($this->table)->insert([
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'gallery_id' => $gallery_id,
            'image' => $image_filename,
            'owner_id' => $owner_id,
        ]);
        //Set Message
        \Session::flash('message', 'Portfolio added successfully');
        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));
    }
    //Show Portfolio Details
    public function details($id){
        //Get Portfolio
        $photos = DB::table($this->table)->where('id',$id)->first();
        //Render
        return view('portfolio.details',compact('photos'));
    }
    //Edit Portfolio
    public function edit($id){
        $photos = DB::table($this->table)->where('id',$id)->first();
        //Render
        return view('portfolio.edit',compact('photos'));
    }
    //Update Data
    public function updateData(Request $request){
        $id = $request->input('id');
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;


        //Check Image Upload
        if($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
            //Update Image
            DB::table($this->table)->where('id',$id)->update([
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'gallery_id' => $gallery_id,
                'image' => $image_filename,
                'owner_id' => $owner_id,
            ]);
        }
        else{
            DB::table($this->table)->where('id',$id)->update([
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'gallery_id' => $gallery_id,
                'owner_id' => $owner_id,
            ]);
        }
        //Set Message
        \Session::flash('message', 'Portfolio Updated successfully');
        //Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));

    }
    //Delete portfolio
    public function destroy($id, $gallery_id){
        $photos = DB::table($this->table)->where('id',$id)->delete();
        //Set Message
        \Session::flash('message', 'Portfolio deleted successfully');
        //Render
        return \Redirect::route('gallery.show', array('id' => $gallery_id));

    }
}
