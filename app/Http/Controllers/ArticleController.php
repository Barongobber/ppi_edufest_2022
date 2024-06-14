<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    private function validateArticleData(Request $request, $id = null)
    {
        $uniqueTitleRule = $id ? Rule::unique('articles')->ignore($id) : 'unique:articles';

        return $request->validate([
            'title' => ['required', 'string', $uniqueTitleRule],
            'writer' => ['required', 'string'],
            'description' => ['required', 'string'],
            'writer_school' => ['required', 'string'],
            'writer_ppi' => ['required', 'string'],
            'file' => ['required', 'file']
        ]);
    }

    public function read()
    {
        return Article::all();
    }

    public function readDetail($id)
    {
        return Article::findOrFail($id);
    }

    public function insert()
    {
        $validatedData = $this->validateArticleData(request());

        $fileName = request('file')->getClientOriginalName();

        $articleData = array_merge($validatedData, [
            'file' => $fileName
        ]);

        $article = Article::create($articleData);

        $newPath = public_path() . '/storage/file/articles/' . $article->id;
        request('file')->move($newPath, $fileName);

        return $article;
    }

    public function updateFile($id)
    {
        request()->validate([
            'file' => ['required', 'file']
        ]);

        $article = Article::findOrFail($id);
        $oldFilePath = public_path() . '/storage/file/articles/' . $article->id;
        
        array_map('unlink', glob("$oldFilePath/*.*"));

        $fileName = request('file')->getClientOriginalName();
        $article->update(['file' => $fileName]);

        request('file')->move($oldFilePath, $fileName);

        return $article;
    }

    public function update($id)
    {
        $validatedData = $this->validateArticleData(request(), $id);

        $article = Article::findOrFail($id);
        $article->update($validatedData);

        return $article;
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        $filePath = public_path() . '/storage/file/articles/' . $article->id;
        array_map('unlink', glob("$filePath/*.*"));
        rmdir($filePath);

        $article->delete();

        return ['response' => 'Success to delete'];
    }
}
