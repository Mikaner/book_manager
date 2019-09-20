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
        // same action as index()
        $items = DB::select('select * from sample_book');
        return view('pages.index', ['items' => $items]);
    }

    public function add(Request $request) {
        return view('pages.add');
    }

    public function login(Request $request) {
        return view('pages.login', ['msg'=>'フォームを入力:']);
    }

    public function login_post(Request $request) {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
        $this->validate($request, $validate_rule);
        return view('pages.login', ['msg'=>'正しく入力されました!']);
    }

    public function create(Request $request) {
        $param = [
            'title' => $request->title,
            'lending' => $request->lending,
        ];
        DB::insert('insert into sample_book (title, lending) values (:title, :lending)', $param);
        return redirect('/main');
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
