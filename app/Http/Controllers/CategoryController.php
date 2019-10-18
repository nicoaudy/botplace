<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $category = Category::when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%");
        })->paginate($perPage);

        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        Category::create(request()->all());
        flash('Your data has been created')->success();
        return redirect('category');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);
        $category->update(request()->all());

        flash('Your data has been updated')->success();
        return redirect('category');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        flash('Your data has been deleted')->error();
        return redirect('category');
    }
}
