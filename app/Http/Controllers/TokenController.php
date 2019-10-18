<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Category;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function index()
    {
        $token = Token::all();
        return view('token.index', compact('token'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('token.create', compact('categories'));
    }

    public function store()
    {
        $this->changeOtherStatus(request('active'));
        Token::create(request()->all());
        flash('Your data has been created')->success();
        return redirect('token');
    }

    public function show($id)
    {
        $token = Token::findOrFail($id);
        return view('token.show', compact('token'));
    }

    public function edit($id)
    {
        $token = Token::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('token.edit', compact('token', 'categories'));
    }

    public function update($id)
    {
        $token = Token::findOrFail($id);

        $this->changeOtherStatus(request('active'));
        $token->update(request()->all());

        flash('Your data has been updated')->success();
        return redirect('token');
    }

    public function destroy($id)
    {
        Token::destroy($id);
        flash('Your data has been deleted')->error();
        return redirect('token');
    }

    private function changeOtherStatus($status)
    {
        if ($status == 1) {
            Token::where('active', 1)->update(['active' => false]);
        }
    }
}
