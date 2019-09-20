@extends('layouts.booksapp')

@section('title', 'Index')
@section('menuber')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
    <tr><th>Title</th><th>lending</th></tr>
    @each('components.item', $items, 'item')
    </table>
    @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。'])
@endsection

@section('footer')
copyright 2019 Mikaner.
@endsection
