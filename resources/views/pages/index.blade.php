@extends('layouts.booksapp')

@section('title', 'Index')
@section('menuber')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
    <tr><th>Title</th><th>lending</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->lending}}</td>
        </tr>
    @endforeach
    </table>
@endsection

@section('footer')
copyright 2019 Mikaner.
@endsection
