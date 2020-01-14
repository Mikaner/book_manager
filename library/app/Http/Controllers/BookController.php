<?php

namespace App\Http\Controllers;

use App\BookInfo;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = BookInfo::all();
        if(isset($request->input)){
            $items = BookInfo::where('title',$request->input)->get();
        }
        $param = ['input' => $request->input, 'items' => $items];
        return view('pages.bookinfo', $param);
    }

    public function add(Request $request)
    {
        return view('book.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, BookInfo::rules);
        $book = new BookInfo;
        $form = $request->all();
        unset($form['_token']);
        $book->fill($form)->save();
        return redirect('/book');
    }
}
