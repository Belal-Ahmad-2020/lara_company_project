<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Requests\AboutValidationRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abouts = About::latest()->paginate(3);
        return view('admin.about.index', ['abouts' => $abouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutValidationRequest $req)
    {
        //
        $req->validated();

        About::create([
            'title' => $req->title,
            'short_des' => $req->short_des,
            'long_des' => $req->long_des
        ]);

        return redirect()->route('about.index')->with('success', 'About data created!');
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
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AboutValidationRequest $req, $id)
    {
        //
        $req->validated();

        About::where('id', $id)->update([
            'title' => $req->title,
            'short_des' => $req->short_des,
            'long_des' => $req->long_des
        ]);

        return redirect()->route('about.index')->with('success', 'About data updated!');
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
        About::find($id)->delete();

        return redirect()->route('about.index')->with('success', 'About data deleted!');
    }
}
