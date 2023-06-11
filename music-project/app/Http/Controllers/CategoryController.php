<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

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

        $category = new Category;
        $category->ma_tloai = $request->input('ma_tloai');
        $category->ten_tloai = $request->input('name_category');
        $category->save();
    }

    /**
     * Store a newly created resource in storage.
     */

    public function edit(string $id = null)
    {
        if ($id == null) {

            $title = 'Add new category';
            return view('admin.categories.category', compact('title'));
        } else {
            $category = Category::where('ma_tloai', $id)->get()->first();
            $title = $category->ten_tloai;
            return view('admin.categories.category', compact('category', 'title'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Category::where('ma_tloai', $request->input('id_category'))
        ->update(['ten_tloai' => $request->input('name_category')]);

      
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_category' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Kiểm tra xem action của button submit trước đó là thêm mới hay cập nhật
            $action = $request->input('action');
            if ($action == 'create') {
                // Thực hiện gọi đến hàm create nếu dữ liệu hợp lệ
                $this->create($request);
                return redirect()->route('category.index')->with('success', 'Category added successfully.');
            } elseif ($action == 'update') {
                // Thực hiện gọi đến hàm update nếu dữ liệu hợp lệ
                $this->update($request);
                return redirect()->route('category.index')->with('success', 'Category updated successfully.');
            }
           
        }
    }
}
