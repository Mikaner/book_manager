<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    //
    public function index(Request $request) {
        if ( isset($request->id))
        {
            $param = ['id' => $request->id];
            $items = DB::select('select * from sample_book where id = :id',
                                $param);
        } else {
            $items = DB::select('select * from sample_book');
        }
        return view('pages.index', ['items' => $items]);
    }

    public function post(Request $request) {
        $items = DB::select('select * from sample_book');
        return view('pages.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('pages.add');
    }

    public function create(Request $request) {
        $param = [
            'title' => $request->title,
            'lending' => $request->lending,
        ];
        DB::insert('insert into sample_book (title, lending) values (:title, :lending)', $param);
        return redirect('/hello');
    }
}
