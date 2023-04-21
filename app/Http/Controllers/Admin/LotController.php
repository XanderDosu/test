<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Category;
use App\Http\Filters\LotFilter;

use App\Http\Controllers\Controller;


class LotController extends Controller
{
    public function index(LotFilter $request)
    {   
        $lots = Lot::filter($request)->get();
        $categories = Category::all();
        $filteredCategoryId = request()->query('category_id');
        return view('admin.lot.index', compact(['lots', 'categories', 'filteredCategoryId']));
       
    }
    
    public function create()
    {   
       $categories = Category::all();
       return view('admin.lot.create', compact('categories'));
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
        ]);
        $newLot = new Lot;
        $newLot->title = $request->title;
        $newLot->description = $request->description;
        $newLot->save();
        $newLot->categories()->sync($request->categories_ids);
        session()->flash('success', 'The lot was successfully saved.');
        
        return redirect(route('admin.lot.index'));

    }
    
    public function show($id)
    {
        $lot = Lot::find($id);
        return view('admin.lot.show', compact('lot'));
    }
    
     public function edit($id)
    {
        $lot = Lot::find($id);
        $categories = Category::all();
        $lotCategoriesIds = $lot->categories->pluck('id');
        return view('admin.lot.edit', compact('lot', 'categories', 'lotCategoriesIds'));
        
    }
    
    public function update(Request $request, $id)
    {   
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
        ]);
        $lot = Lot::find($id);
        $lot->title = $request->title;
        $lot->description = $request->description;
        $lot->save();
        $lot->categories()->sync($request->categories_ids);
        session()->flash('success', 'The lot was successfully updated.');
        
        return redirect(route('admin.lot.index'));

    }

    public function delete($id)
    {
        Lot::destroy($id);
        session()->flash('success', 'The lot was successfully deleted.');
        return redirect(route('admin.lot.index'));
    }
    
}
