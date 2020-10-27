<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoryFormController extends Controller
{
    public function index()
    {
        return view('category-form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'parent_id'=>'required',     ]);
        $category = new Category; // name of the table
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect('category-form')->with('status', 'Product_Cateogry Data Has Been inserted');
    }
}
