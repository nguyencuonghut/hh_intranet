<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use Image;
use Session;
use App\Type;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::orderBy('id', 'desc')->paginate(10);

        return view('uploads.index')->withPictures($pictures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('uploads.create')->withTypes($types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'pics'          => 'required',
            'type_id'       => 'required'
        ));

        if ($request->hasFile('pics')) {
            foreach ($request->pics as $image){
                $pic = new Picture;
                $filename = str_random(5) . '.' . $image->getClientOriginalName();
                $location = public_path('upload/galleries/' . $filename);
                // Resize and save the big image
                if(1 == $request->type_id) {
                    Image::make($image)->resize(600, 400)->save($location);
                } else {
                    Image::make($image)->save($location);
                }
                $pic->name = $filename;
                $pic->type_id = $request->type_id;

                $pic->save();
            }
        }

        Session::flash('success', 'The blog post was successfully saved!');
        // redirect to other page

        return redirect()->route('pics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pic= Picture::find($id);
        return view('uploads.show')->withPicture($pic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post
        $picture = Picture::find($id);
        $types = Type::all();
        //return view
        return view('uploads.edit')->withPicture($picture)->withTypes($types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $picture = Picture::find($id);
        // Validate the data
        $this->validate($request, array(
            'type_id'       => 'required'
        ));

        if ($request->hasFile('pic')) {
            $image = $request->pic;
            $filename = str_random(5) . '.' . $image->getClientOriginalName();
            $location = public_path('upload/galleries/' . $filename);
            // Resize and save the big image
            if(1 == $request->type_id) {
                Image::make($image)->resize(600, 400)->save($location);
            }else{
                Image::make($image)->save($location);
            }
            $picture->name = $filename;

        }
        $picture->type_id = $request->type_id;

        $picture->save();

        Session::flash('success', 'The blog post was successfully saved!');
        // redirect to other page

        return redirect()->route('pics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::find($id);
        $picture->delete();
        Session::flash('success', 'The image was successfully deleted.');
        return redirect()->route('pics.index');
    }
}
