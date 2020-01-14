@extends ('layouts.booksapp')

@section ('title', 'remove')

@section ('menuber')
    @parent
    本を削除
@endsection

@section ('content')
    <p>{{$msg}}</p>
@endsection

@section ('footer')
copyright 2019 Mikaner.
@endsection
