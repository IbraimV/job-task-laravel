<?php

namespace App\Http\Controllers;

use App\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    //
    public function index()
    {
        //
        $parsers = Parser::all();
        return view('parser.index', compact('parsers'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'start_url' => 'required',
            'selector_url' => 'required',
            'selector_title' => 'required',
            'selector_image' => 'required',
            'selector_image_attr' => 'required',
            'selector_content' => 'required'
        ]);
        Parser::create($request->all());
        return redirect()->route('parser.index');
    }

    public function create()
    {
        //
        return view('parser.create');
    }

    public function destroy($id)
    {
        //
        $parser = Parser::find($id);
        $parser->delete();
        return redirect()->route('parser.index')->with('success', 'Post has been deleted');
    }
}
