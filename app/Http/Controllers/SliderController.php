<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderValidationRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', [
            'sliders'=>$sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderValidationRequest $request)
    {
        //validation
        $request->validated();


        // store image
        $image = $request->file('image');
        $imgName = hexdec(uniqid()) . "_" . $request->title . "." . strtolower($image->getClientOriginalExtension());
        $imgDes = "images/slider/";
        $final_img = $imgDes . $imgName;
        $image->move($imgDes, $imgName);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $final_img
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider added successfully!');

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
        
        $slider = Slider::find( $id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderValidationRequest $request, $id)
    {
        //
        $request->validated();


       $image = $request->file('image');
       $old_image = $request->old_image;

       if ($image) {
        $imgName = hexdec(uniqid()) . "_" . $request->title . "." . strtolower($image->getClientOriginalExtension());
        $imgDes = "images/slider/";
        $final_img = $imgDes . $imgName;
        $image->move($imgDes, $imgName);

        unlink($old_image);

        Slider::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $final_img
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');

       }
       else {
        Slider::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $old_image
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully!');

       }




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
        $slider = Slider::find($id);
        unlink($slider->image);
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully!');
    }
}
