<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function index(Request $request) {
        $items = null;
        $items = DB::select(
                             'SELECT info.book_id, info.title, auth.author_name, info.thumbnail 
                             FROM books_information info 
                             JOIN (
                                   select b_a.book_id, a.author_name 
                                   FROM book_author b_a
                                   JOIN author a ON(b_a.author_id = a.author_id)
                                  ) auth 
                             ON (info.book_id = auth.book_id)'
                            );
        return view('pages.index', ['items' => $items]);
    }

    public function post(Request $request) {
        // same action as index()
        $items = null;
        #$items = DB::select('select * from books');
        return view('pages.index', ['items' => $items]);
    }

    public function test(Request $request){
        if ( isset($request->id))
        {
            $param = ['id' => $request->id];
            $items = DB::select('select * from sample_book where id = :id',
                                $param);
        } else {
            $items = DB::select('select * from sample_book');
        }

        return view('pages.test',['items' => $items]);
    }
}
