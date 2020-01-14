<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemoveController extends Controller
{
    //
    public function index(Request $request) {
        return view('pages.remove',['msg' => '本当に削除しますか？']);
    }
    public function del(Request $request) {
        $param = ['id' => $request->id];
        $item = DB::select('select * from sample_book where id = :id', $param);
        return view('pages.del',['form' => $item[0]]);
    }
    public function remove(Request $request) {
        $param = ['id' => $request->id];
        DB::delete('delete from sample_book where id = :id', $param);
        return redirect('/main');
    }
}
