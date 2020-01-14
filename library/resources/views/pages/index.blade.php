@extends('layouts.booksapp')

@section('title', 'Index')
@section('menuber')
    @parent
    インデックスページ<br>
    {{$view_message}}
@endsection

@section('content')
    <form action="/book" method="get">
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
    </form>
    <table>
    <tr><th>Image</th><th>Title</th><th>Author</th></tr>
    @each ('components.home_item', $items, 'item')
    @foreach ($items as $item)
    <tr>
        <td>{{$item -> getData()}}</td>
        <td>
        @if ($item->author != null)
            <table>
            @foreach ($item as $author)
                @if ($author->author_name != null)
                    <tr><td>{{$author->getData()}}</td></tr>
                @endif
            @endforeach
            </table>
        @endif
        </td>
    </tr>
    @endforeach
    </table>
@endsection

@section('footer')
copyright 2019 Mikaner.
@endsection
