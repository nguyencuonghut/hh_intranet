<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Image;
use Session;
use DOMDocument;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the posts
        // create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(15);

        // return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
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
            'title'         => 'required',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->category_id = $request->category_id;


        $message = $request->input('body');
        $dom = new DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . "<div>$message</div>");

        $container = $dom->getElementsByTagName('div')->item(0);
        $container = $container->parentNode->removeChild($container);

        while($dom->firstChild) {
            $dom->removeChild($dom->firstChild);
        }
        while ($container->firstChild ) {
            $dom->appendChild($container->firstChild);
        }
        $images = $dom->getElementsByTagName('img');

        foreach($images as $img){
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid() . '.' . $mimetype;
                $filepath = '/images/' . $filename;
                // You can put your directory to upload image
                Image::make($src)->resize(600, 400)->save(public_path($filepath));
                $post->image = $filename;
                $new_src = $filepath;
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);

                // Resize and save the medium image
                $location = public_path('images/' . $filename);
                $medium_location = public_path('images/' . 'medium_' . $filename);
                Image::make($location)->resize(180, 120)->save($medium_location);
                $post->medium_image = 'medium_' . $filename;
                // Resize and save the small image
                $small_location = public_path('images/' . 'small_' . $filename);
                Image::make($location)->resize(71, 47)->save($small_location);
                $post->small_image = 'small_' . $filename;
            }
        };

        $post->body = $dom->saveHTML();


        /*
        $post->body = $request->body;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            // Resize and save the big image
            Image::make($image)->resize(600, 400)->save($location);
            $post->image = $filename;
            // Resize and save the medium image
            $medium_location = public_path('images/' . 'medium' . $filename);
            Image::make($location)->resize(180, 120)->save($medium_location);
            $post->medium_image = 'medium' . $filename;
            // Resize and save the small image
            $small_location = public_path('images/' . 'small' . $filename);
            Image::make($location)->resize(71, 47)->save($small_location);
            $post->small_image = 'small' . $filename;
        }
      */

        // Save the attached file
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalName();
            $post->file = $filename;
            $location = public_path('upload/files/');
            $request->file('file')->move($location, $filename);
        }

        $post->save();
        Session::flash('success', 'The blog post was successfully saved!');
        // redirect to other page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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
        $post = Post::find($id);
        $categories = Category::all();
        //return view
        return view('posts.edit')->with(['post' => $post, 'categories' => $categories]);
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
        // Validate the data
        $post = Post::find($id);
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'body'          => 'required',
            'category_id'   => 'required|integer'
        ));

        // Save the data to database
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');


        $message = $request->input('body');
        $dom = new DOMDocument('1.0', 'UTF-8');

        // set error level
        $internalErrors = libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">' . "<div>$message</div>");

        $container = $dom->getElementsByTagName('div')->item(0);
        $container = $container->parentNode->removeChild($container);

        while($dom->firstChild) {
            $dom->removeChild($dom->firstChild);
        }
        while ($container->firstChild ) {
            $dom->appendChild($container->firstChild);
        }
        $images = $dom->getElementsByTagName('img');

        foreach($images as $img){
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if(preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid() . '.' . $mimetype;
                $filepath = '/images/' . $filename;
                // You can put your directory to upload image
                Image::make($src)->resize(600, 400)->save(public_path($filepath));
                $post->image = $filename;
                $new_src = $filepath;
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);

                // Resize and save the medium image
                $location = public_path('images/' . $filename);
                $medium_location = public_path('images/' . 'medium_' . $filename);
                Image::make($location)->resize(180, 120)->save($medium_location);
                $post->medium_image = 'medium_' . $filename;
                // Resize and save the small image
                $small_location = public_path('images/' . 'small_' . $filename);
                Image::make($location)->resize(71, 47)->save($small_location);
                $post->small_image = 'small_' . $filename;
            }
        };
        $post->body = $dom->saveHTML();

        /*
        $post->body = $request->input('body');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(600, 400)->save($location);
            $post->image = $filename;
        }
        */


        // Save the attached file
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalName();
            $post->file = $filename;
            $location = public_path('upload/files/');
            $request->file('file')->move($location, $filename);
            $post->file = $filename;
        }

        $post->save();

        // Set the flash message
        Session::flash('success', 'Bài viết đã được update thành công.');

        // Redirect to posts.show
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
