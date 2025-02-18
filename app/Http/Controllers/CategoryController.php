<?php

namespace App\Http\Controllers;

use App\Http\Requests\categories\AddRequest;
use App\Http\Requests\categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestKey = request()->input('search');
        $categories = Category::when($requestKey, function($query) use($requestKey){
            $query->where('name', 'like',  "%$requestKey%");
        })
        ->latest()
        ->paginate(50);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', $th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category->expenses){
            return redirect()->route('categories.index')->with('error', 'Category has expenses');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
