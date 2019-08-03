@extends('layouts.booksapp')

@section('title', 'Add')

@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')
    <table>
    <form action="/hello/add" method="post">
        {{ csrf_field() }}
        <tr><th>title: </th><td><input type="text" name="title"></td></tr>
        <tr><th>lending</th><td>
            <fieldset>
                <label><input type="radio" name="lending" value="1">貸出</label> <label><input type="radio" name="lending" value="0">返却</label> 
            </fieldset>
        </td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
    </table>
@endsection

@section('footer')
copyright 2019 Mikaner.
@endsection
