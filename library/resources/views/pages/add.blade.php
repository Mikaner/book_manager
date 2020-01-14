@extends ('layouts.booksapp')

@section ('title', 'Add')

@section ('menuber')
    @parent
    新規本追加ページ
@endsection

@section ('content')
    @if (count($errors) >0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <script>
        var plus = function(){
            var group = document.getElementById('add_author');
            var count = group.getElementsByTagName('td').length;
            var parent_node = group.getElementsByTagName('td')[0].parentNode;
            var td_node = document.createElement('td');
            td_node.setAttribute('id', 'td' + (count + 1));
            parent_node.appendChild(td_node);

            document.getElementById('td'+(count + 1)).innerHTML = '<input type="text" name="author[]">';
        }
    </script>
    <table id="add_form">
    <form action="/add" method="post">
        {{ csrf_field() }}
        <tr><th>title: </th><td><input type="text" name="title" value="{{old('title')}}"></td></tr>
        <tr><th>isbn10: </th><td><input type="text" name="isbn10" value="{{old('isbn10')}}"></td></tr>
        <tr><th>isbn13: </th><td><input type="text" name="isbn13" value="{{old('isbn13')}}"></td></tr>
        <tr id="add_author">
            <th>author: </th>
            <td>
                <input type="text" name="author[]">
            </td>
        </tr>
        <tr><th>publisher: </th><td><input type="text" name="publisher_name" value="{{old('pulisher_name')}}"></td></tr>
        <tr><th>published_date: </th><td><input type="date" name="published_date" value="{{old('published_date')}}"></td></tr>
        <tr><th>description: </th><td><input type="text" name="description" value="{{old('description')}}"></td></tr>
        <tr><th>thumbnail: </th><td><input type="url" name="thumbnail" value="{{old('thumbnail')}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
    <button onclick="plus();">+author</button>
    </table>
@endsection

@section ('footer')
copyright 2019 Mikaner.
@endsection
