@extends ('layouts.booksapp')

@section ('title', 'Book.index')
@section ('menuber')
    @parent
    インデックスページ
@endsection

@section ('content')
    <table>
    <tr><th>Image</th><th>Title</th><th>Author</th></tr>
    @each ('components.item', $items, 'item')
    </table>
@endsection

@section ('footer')
copyright 2019 Mikaner.
@endsection
