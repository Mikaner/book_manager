@extends ('layouts.booksapp')

@section ('title', 'test.bookinfo')
@section ('menuber')
    @parent
    テストページ
@endsection

@section ('content')
    <table>
    <tr><th>Thumbnail</th><th>Title</th><th>Author</th></tr>
    @foreach ($items as $item)
        <tr>
            <td><img src='{{$item->getThubnailData()}}'></td>
            <td>{{$item->getData()}}</td>
            <td>@if ($item->authors != null)
                    @foreach ($item->authors as $auth)
                        @if ($auth->author != null)
                            {{$auth->author->getData()}}
                        @endif
                    @endforeach
                @endif
            </td>
        </tr>
    @endforeach
    </table>
@endsection

@section ('footer')
copyright 2020 Mikaner.
@endsection
