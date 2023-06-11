<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories =  Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->has('add')) {
            // validate dữ liệu từ form
           $request->validate([
                'name_category' => 'required|max:50'
            ]);
            $category = new Category;
            $category->ma_tloai = $request->input('ma_tloai');
            $category->ten_tloai = $request->input('name_category');
            $category->save();
            return redirect()->route('category.index')->with('success', 'Category added successfully.');
        } else if( $request->has('update')){
           
            return redirect()->route('category.update');
        }else{
            return view('admin.categories.category', ['title' => 'Add new category']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function edit(string $id)
    {
        
        $category = Category::where('ma_tloai', $id)->get()->first();
        $title = $category->ten_tloai;
        return view('admin.categories.category', compact('category', 'title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if ($request->has('update')) {
            // validate dữ liệu từ form
           echo "đã cập nhật dữ liệu thành công";
        }else{
            return view('admin.categories.category', ['title' => 'Edit category']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::where('ma_tloai', $id)->get()->first();
        if (!$category) {
            // If the category doesn't exist, redirect to the index page
            return redirect()->route('admin.categories.index')->with('error', 'Category not found.');
        }

        // Check if the user confirmed the deletion
        if (request()->has('delete')) {
            // Delete the category and redirect to the index page
            Category::where('ma_tloai', $id)->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        } else {
            // If the user cancelled, redirect back to the delete form
            return view('admin.categories.delete', compact('id'));
        }
    }
}
