<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    
    /**
     * constructore
     * auth middleware
     */
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::all();
        // dd($images);
        return view('admin.multipic.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd("Hello");

        $images = $request->file('image');

        foreach($images as $image) {
        $name_generate = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_generate . '.' . $img_ext;
        $upload_location = 'images/multipic/';
        $final_img =  $upload_location . $img_name;
        $image->move($upload_location, $img_name);

        Image::create([
            'image' => $final_img
        ]);
        
        }    

        return redirect()->route('image.index')->with('success', 'Images Uploaded Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
