<?php

namespace App\Http\Controllers;

use App\Publisher;
use App\BookInfo;
use App\Author;
use App\BookAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddController extends Controller
{
    //
    public function add(Request $request) {
        if(isset($request->book_id)){
            $id = $request->book_id;
            $url = self::_MakeDetailsUrl($id);
            $details = self::_cURL_GetBooksDetails($url);
        }else{
            $details = null;
        }
        return view('pages.add', ['items'=>$details]);
    }

    public function test_create(Request $request){
        $publisher_id = Publisher::where('publisher_name',$request->publisher_name)->first();

        # If there is not publisher name by request in database,
        # add publisher name into database.
        if($publisher_id == null){
            $this->validate($request, Publisher::$rules);
            $publisher = new Publisher;
            $publisher->publisher_name = $request->publisher_name;

            $publisher->save();
            $publisher_id = Publisher::where('publisher_name',$request->publisher_name)->first();
        }

        $this->validate($request, BookInfo::$rules);
        $bookinfo = new BookInfo;
        $bookinfo->fill($request);
        $bookinfo->publisher_id = $publisher_id;
        $bookinfo->save();

        $book_id = BookInfo::where('book_title',$request->title)->first();

        foreach($request->author as $author_name){
            $author_id = Author::where('author_name',$author_name)->first();

            if($author_id == null){
                $this->validate($author_name, Author::$rules);
                $author = new Author;
                $author->author_name = $author_name;

                $author->save();

                $author_id = Author::where('author_name',$author_name)->first();
            }

            $book_author = new BookAuthor;
            $book_author->book_id = $request->book_id;
            $book_author->author_id = $request->author_id;
            $book_author->save();
        }

        return view('/book');
    }

    public function create(Request $request) {
        # If there is not publisher_name by request in database,
        # add publisher_name into database.
        if(
            !(
              DB::table('publisher')
                ->where('publisher_name',$request->publisher_name)
                ->get()
             )
          ){
            $publisher_params = [
                'publisher_name' => $request->publisher_name,
            ];
            DB::table('publisher')->insert($publisher_params);
        }

        $publisher_id_param = DB::table('publisher')
                                ->where('publisher_name',$request->publisher_name)
                                ->first('publisher_id');
        $source_id_param = 1;
        if($request->source_id){
            $source_id_param = $request->source_id;
        }
        $book_info_params = [
            'source_id' => $source_id_param,
            'title' => $request->title,
            'isbn10' => $request->isbn10,
            'isbn13' => $request->isbn13,
            'publisher_id' => $publisher_id_param,
            'published_date' => $request->published_date,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail,
        ];
        DB::table('books_information')->insert($book_info_params);

        foreach($request->author as $author_name){
            if(!(DB::table('author')->where('author_name',$author_name)->get())){
                $author_params = [
                    'author_name' => $author_name,
                ];
                DB::table('author')->insert($author_params);
            }
            $book_id_param = DB::table('books_information')
                               ->where('title',$request->title)
                               ->first('book_id');
            $author_id_param = DB::table('author')
                                 ->where('author_name',$request->author_name)
                                 ->first('author_id');
            $book_author_params = [
                'book_id' => $book_id_param,
                'author_id' => $author_id_param,
            ];
            DB::table('book_author')->insert($book_author_params);
        }
        return redirect('/main');
    }

    private function _MakeBooksDetailsGoogleUrl($book_id) {
        $baseurl = 'https://www.googleapi.com/v1/books/volumes/';
        $url = $baseurl.$book_id;
        return $url;
    }

    private function _cURL_GetBooksDetailsByGoogle($url) {
        $bookDetails = new \stdClass();

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        $result = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        $json = mb_convert_encoding($result,'UTF8','ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        $obj = json_decode($json, true);

        $bookDetails->title = $obj["title"];

        return $bookDetails;
    }
}
