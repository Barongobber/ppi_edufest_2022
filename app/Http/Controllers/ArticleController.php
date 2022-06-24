<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function read() {
        $articles = Article::all();
        return $articles;
    }

    public function readDetail($id) {
        $article = Article::where('id', $id)->first();
        $data = [$article];
        return $data;
    }
    
    public function insert() {
        request()->validate([
            'title' => ['required', 'string'],
            'writer' => ['required', 'string'],
            'description' => ['required', 'string'],
            'writer_school' => ['required', 'string'],
            'writer_ppi' => ['required', 'string'],
            'file' => ['required']
        ]);

        $check = Article::where('title', request('title'))->first();
        if ($check)
            abort(400, 'Sorry, cannot insert the same article\'s title as the existing one');
        
        $fileName = request('file')->getClientOriginalName();

        $articleData = [
            'title' => request('title'),
            'writer' => request('writer'),
            'description' => request('description'),
            'writer_school' => request('writer_school'),
            'writer_ppi' => request('writer_ppi'),
            'file' => $fileName
        ];

        $article = Article::create($articleData);

        $newPath = public_path() . '/storage/file/articles/' . $article->id;

        //Store a file to the article path
        request('file')->move($newPath, $fileName);

        return $articleData;
    }

    public function updateFile($id) {
        request()->validate([
            'file' => ['required']
        ]);
    
        // get article by id
        $article = Article::find($id);
        $oldFilePath = public_path() . '/storage/file/articles/' . $article->id;

        //replace old picture name
        array_map('unlink', glob("$oldFilePath/*.*"));
        $fileName = request('file')->getClientOriginalName();        
        $article->file = $fileName;
        $article->save();

        // Add new file to storage
        request('file')->move($oldFilePath, $fileName);

        return $article;
    }

    public function update($id) {
        request()->validate([
            'title' => [
                'required',
                'string',
                Rule::unique('articles')->ignore($id)
            ],
            'writer' => ['required', 'string'],
            'description' => ['required', 'string'],
            'writer_school' => ['required', 'string'],
            'writer_ppi' => ['required', 'string']
        ]);

        $article = Article::where('id', $id)->first();

        $articleData = [
            'title' => request('title'),
            'writer' => request('writer'),
            'description' => request('description'),
            'writer_school' => request('writer_school'),
            'writer_ppi' => request('writer_ppi')
        ];

        $article->update($articleData);

        $response = [
            "article" => [
                'title' => $article->title,
                'writer' => $article->writer,
                'description' => $article->description,
                'writer_school' => $article->writer_school,
                'writer_ppi' => $article->writer_ppi,
                'file' => $article->file
            ]
        ];

        return $response;
    }
    
    public function delete($id) {
        $article = Article::where('id', $id);
        $articleObject = $article->first();

        //Delete directory and pictures
        $filePath = public_path() . '/storage/file/articles/' . $articleObject->id;
        array_map('unlink', glob("$filePath/*.*"));
        rmdir($filePath);

        $deleteArticle = $article->delete();
        $msg = "success to delete";
        return [
            'response' => $msg
        ];
    }
}
