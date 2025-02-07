<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function index () {
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }


    public function create () {
        $authors = Author::where('status', 1)->get();
        return view('books.create', compact('authors'));
    }


    public function store (Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'publishDate' => 'required|date',
            'author' => 'required|exists:authors,id'
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }


    public function show ($id) {
        $book = Book::with('author')->findOrFail($id);
        return view('books.show', compact('book'));
    }


    public function edit ($id) {
        $book = Book::findOrFail($id);
        $authors = Author::where('status', 1)->get(); // Apenas autores ativos
        return view('books.edit', compact('book', 'authors'));
    }


    public function update (Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'publication_date' => 'required|date',
            'author' => 'required|exists:authors,id'
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }


    public function destroy ($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro removido com sucesso!');
    }
}
