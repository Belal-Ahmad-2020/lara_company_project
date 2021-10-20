<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandValidationRequest;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
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
        // display all brands
        $brands = Brand::latest()->paginate(5);
        $trashBrand = Brand::onlyTrashed()->latest()->paginate(3);
        return view('admin.brand.index', compact('brands', 'trashBrand'));        

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
    public function store(BrandValidationRequest $request)
    {
        //validation in BrandValidationRequest 
        $request->validated();

        // image Upload                       
        // $imageName = time() . "-" . $request->brand_name . '.' . $request->brand_image->extension();
        // dd($imageName);
        // $request->brand_image->move(public_path('images/brand/', $imageName));

        // second way
        $brand_image = $request->file('brand_image');

        $name_generate = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_generate . '.' . $img_ext;
        $upload_location = 'images/brand/';
        $final_img =  $upload_location . $img_name;
        $brand_image->move($upload_location, $img_name);


        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $final_img;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand created succesfully!');
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
        $brand = Brand::find($id)->first();
        return view('admin.brand.edit', compact('brand'));
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
        
          //validation in BrandValidationRequest 
          $request->validate([
              'brand_name' => 'required|min:4'
          ]);          

        //   //image
          $brand_image = $request->file('brand_image');            
          $old_image = $request->old_image;
          

          if ($brand_image) {
            $name_generate = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_generate . '.' . $img_ext;
            $upload_location = 'images/brand/';
            $final_img =  $upload_location . $img_name;
            $brand_image->move($upload_location, $img_name);

            unlink($request->old_image);
             $brand = new Brand;
            $brand::where('id', $id)->update([
                "brand_name" => $request->brand_name,
                'brand_image' => $final_img
            ]);
    
           return redirect()->route('brand.index')->with('success', 'Brand updated succesfully!');
          }          
          else {
            $brand = new Brand;
            $brand::where('id', $id)->update([
                "brand_name" => $request->brand_name,                
            ]);
    
           return redirect()->route('brand.index')->with('success', 'Brand updated succesfully!');
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
        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted succesfully!');
    }
}
