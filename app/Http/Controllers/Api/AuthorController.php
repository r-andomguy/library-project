<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller {
    public function __construct () {
        $this->middleware('auth:sanctum');
    }

    public function index () {
        return response()->json(Author::all());
    }

    public function store (Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:100',
        ]);

        $author = Author::create([
            'name' => $request->name,
            'state' => $request->state
        ]);

        return response()->json($author, 201);
    }

    public function show ($id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }

        return response()->json($author);
    }

    public function update (Request $request, $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update(['name' => $request->name]);

        return response()->json($author);
    }

    public function destroy ($id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }

        if ($author->books()->exists()) {
            return response()->json(['error' => 'Não é possível excluir um autor que possui livros associados.'], 400);
        }

        $author->delete();

        return response()->json(['message' => 'Autor excluído com sucesso']);
    }

    public function books ($id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Autor não encontrado'], 404);
        }

        return response()->json($author->books);
    }
}
