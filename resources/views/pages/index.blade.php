@extends('layouts.booksapp')

@section('title', 'Index')
@section('menuber')
    @parent
    インデックスページ<br>
    {{$view_message}}
@endsection

@section('content')
    <table>
    <tr><th>Title</th><th>lending</th></tr>
    @each ('components.item', $items, 'item')
    </table>
@endsection

@section('footer')
copyright 2019 Mikaner.
@endsection
