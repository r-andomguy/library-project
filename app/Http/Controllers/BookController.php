<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller {

    public function index () {
        $books = Book::with('author')->get();

        foreach ($books as $book) {
            $book->author = Author::find($book->author);
        }

        return view('books.index', compact('books'));
    }


    public function create () {
        $authors = Author::orderBy('id', 'asc')->get();
        return view('books.create', compact('authors'));
    }


    /** @noinspection DuplicatedCode */
    public function store (Request $request) {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'publishDate' => 'required|date',
                'author' => 'required|exists:authors,id',
                'cover' => 'nullable|image|mimes:jpg,png|max:2048',
            ],
            [
                'cover.image' => 'O arquivo enviado deve ser uma imagem.',
                'cover.mimes' => 'A imagem deve estar no formato JPG ou PNG.',
                'cover.max' => 'A imagem não pode ter mais de 2MB.',
            ]
        );

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->publishDate = $request->publishDate;
        $book->author = $request->author;

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::delete("public/covers/$book->cover");
            }

            $book->cover = $this->processCoverImage($request->file('cover'));
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }


    public function show ($id) {
        $book = Book::with('author')->findOrFail($id);
        $book->author = Author::find($book->author);

        return view('books.show', compact('book'));
    }


    public function edit ($id) {
        $book = Book::findOrFail($id);
        $authors = Author::orderByRaw('id = ' . $book->author . ' DESC, name ASC')->get();
        return view('books.edit', compact('book', 'authors'));
    }


    public function update (Request $request, $id) {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'publishDate' => 'required|date',
                'author' => 'required|exists:authors,id',
                'cover' => 'nullable|image|mimes:jpg,png|max:2048',
            ],
            [
                'cover.image' => 'O arquivo enviado deve ser uma imagem.',
                'cover.mimes' => 'A imagem deve estar no formato JPG ou PNG.',
                'cover.max' => 'A imagem não pode ter mais de 2MB.',
            ]
        );

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->publishDate = $request->publishDate;
        $book->author = $request->author;

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::delete("public/covers/$book->cover");
            }

            $book->cover = $this->processCoverImage($request->file('cover'));
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }


    public function destroy ($id) {
        $book = Book::findOrFail($id);

        if ($book->cover) {
            Storage::delete("public/covers/$book->cover");
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro removido com sucesso!');
    }

    /**
     * @throws Exception
     */
    private function processCoverImage ($image): string {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = storage_path("app/public/covers/$filename");

        $img = null;
        if ($image->getClientOriginalExtension() === 'jpg') {
            $img = imagecreatefromjpeg($image->getRealPath());
        } elseif ($image->getClientOriginalExtension() === 'png') {
            $img = imagecreatefrompng($image->getRealPath());
        }

        if (!$img) {
            throw new Exception('Formato de imagem não suportado.');
        }

        $resizedImg = imagescale($img, 200, 200);

        if ($image->getClientOriginalExtension() === 'jpg') {
            imagejpeg($resizedImg, $path);
        } elseif ($image->getClientOriginalExtension() === 'png') {
            imagepng($resizedImg, $path);
        }

        imagedestroy($img);
        imagedestroy($resizedImg);

        return $filename;
    }

}
