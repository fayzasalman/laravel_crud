<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::orderBy('id','desc')->paginate(5);
        return view('category.index', $data);  // it means the index file that we have inside category
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create'); // it means the create.php that we have inside category folder
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'parent_id' => 'required',
        ]);
    
        $category            = new Category; // name of the table
        $category->name      = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('category.index')
                         ->with('success','Product-category has been created successfully.');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }
    
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
    //     $category = Category::findOrFail($request->id);
    //     $category->active = !$category->active;
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        // dd($category);
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category  = Category::where('id', $id)->first();
        $parents   = Category::whereStatus(1)->get();
        return view('category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Category $category)
    {
        $request->validate([
            'name'      => 'required',
            'status'    => 'required',
        ]);
        $category->update($request->all());
        return redirect()->route('category.index')
                         ->with('success','Category updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
                         ->with('success','category has been deleted successfully.');    }
}