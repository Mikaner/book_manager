@extends ('layouts.booksapp')

@section ('title', 'Delete')

@section ('menuber')
    @parent
    削除ページ
@endsection

@section ('content')
    <table>
    <form action="/main/del" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>id: </th><td>{{$form->id}}</td></tr>
        <tr><th>title: </th><td>{{$form->title}}</td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
    </table>
@endsection

@section ('footer')
copyright 2019 mikaner
@endsection
