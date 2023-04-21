<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
       
    }
    
    public function create()
    {   
       return view('admin.category.create');
    }
    
   public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $newCategory = new Category;
        $newCategory->name = $request->name;
        $newCategory->save();
        session()->flash('success', 'The category was successfully saved.');
        return redirect(route('admin.category.index'));
    }
    
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }
    
     public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
        
    }
    
    
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        session()->flash('success', 'The category was  successfully updated.');
        
        return redirect(route('admin.category.index'));

    }

    public function delete($id)
    {
        Category::destroy($id);
        session()->flash('success', 'The category was successfully deleted.');
        return redirect(route('admin.category.index'));
    }
    
}