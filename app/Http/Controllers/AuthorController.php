<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {

    public function index () {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }


    public function create () {
        return view('authors.create');
    }


    public function store (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:100'
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor cadastrado com sucesso!');
    }


    public function show ($id) {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }


    public function edit ($id) {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }


    public function update (Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:100'
        ]);

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso!');
    }


    public function destroy ($id) {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor removido com sucesso!');
    }
}
