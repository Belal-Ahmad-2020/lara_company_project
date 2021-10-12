<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryValidationRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        /*  join using Query Builder
        $cat = DB::table('categories')
        ->join('users', 'categories.user_id', 'users.id')
        ->select('categories.*', 'users.name')
        ->latest()->paginate(5);
        */


        // Display all Categories 
        //$cat = Category::all();  // ASC
        //$cat = Category::latest()->get(); // DESC
        $cat = Category::latest()->paginate(5);  // Pagination
        // Trash
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('cat', 'trashCat'));
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
    public function store(CategoryValidationRequest $request)
    {
        // store data to categories table
        $data = $request->validated();

        /*  Custom Validation Message 
        $validateData = $request->validate([
            'category_name' => 'required|max:255|unique:categories|string'
         ],[
             'category_name.required' => "Name is required",
         ]);
         */

         // you can use both create and insert methods 
         // insert data using ORM method
         /*
         $cat = Category::create([
             'user_id' => Auth::user()->id,
             'category_name' => $request->category_name,
             'created_at' => Carbon::now()
         ]);
        */

         	// second way using Eloquent ORM  this format is professional
            
            $cat = new Category;
            $cat->user_id = Auth::user()->id;
            $cat->category_name = $request->category_name;                
            $cat->save();
            

         return redirect()->back()->with('success', "Categorey added successfully!");

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
        $cat = Category::find($id);        
        return view('admin.category.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidationRequest $request, $id)
    {
        //
        // store data to categories table
        $data = $request->validated();

        Category::find($id)->update([
            'user_id' => Auth::user()->id,
            'category_name' => $request->category_name
        ]);
        

     return redirect()->route('category.index')->with('success', "Categorey updated successfully!");
        
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
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success', "Categorey deleted successfully!");
    }

}
