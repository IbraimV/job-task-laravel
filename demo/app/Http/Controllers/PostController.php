<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        //
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('detail', compact('post'));
    }


    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);
        $data = $request->except(array_keys($request->query()));
        Post::create($data);
    }

    public function edit($id)
    {
        //
        $currentParser = Post::find($id);
        return view('parser.edit', compact('currentParser'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'seotitle' => 'required',
            'description' => 'required',
            'seodescription' => 'required',
            'content' => 'required',
            'bcategory_id' => 'required|integer',
            'tags' => 'array',
            'thumbnail' => 'image'
        ]);

        $parser = Parser::find($id);
        $data = $request->except(array_keys($request->query()));
        $parser->update($data);
        return redirect()->route('parser.index');
    }
}
