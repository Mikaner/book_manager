@extends ('layouts.booksapp')

@section ('title', 'Search')

@section ('menuber')
    @parent
    検索画面
@endsection

@section ('content')
    <form action="/search" method="get">
    <p>
        <label>
            検索ワード:
            <input type="text" name="keyword" size="30" value="{{old('keyword')}}">
        </label>
        <input type="submit" value="検索">
    </p>
    </form>
    @if (isset($items))
        <table>
        <tr><th>Image</th><th>Title</th><th>PreviewLink</th></tr>
        @each ('components.item',$items,'item')
        </table>
    @endif
@endsection

@section ('footer')
copyright 2019 mikaner
@endsection
