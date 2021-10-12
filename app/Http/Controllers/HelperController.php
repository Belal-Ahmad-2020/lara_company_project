<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;


class HelperController extends Controller
{
    
    /**
     * constructore
     * auth middleware
     */
    function __construct()
    {
        $this->middleware('auth');
    }
    //
    //  Resotre Categories from trash 
    public function categoryRestore($id) {
        // return $id;
        Category::onlyTrashed()->find($id)->restore();
        return redirect()->route('category.index')->with('success', "Category restored successfully!");
    }

    // force delete a category from categories table
    public function categoryForceDelete($id) {
        // return $id;
        Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route('category.index')->with('forceDelete', "Category Deleted successfully!");
    }


        //  Resotre Brand from trash 
        public function brandRestore($id) {
            // return $id;
            Brand::onlyTrashed()->find($id)->restore();
            return redirect()->route('brand.index')->with('success', "Brand restored successfully!");
        }

    // force delete Brand from categories table
    public function brandForceDelete($id) {
        // return $id;  
        $brand = Brand::onlyTrashed()->find($id);
        $image = $brand->brand_image;
        unlink($image);        
        $brand->forceDelete();

        return redirect()->route('brand.index')->with('forceDelete', "Brand Deleted successfully!");
    }    

}

