<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request) {
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $url = self::_MakeSearchUrl($keyword);
            $items = self::_cURL_GetSearch($url);
        } else {
            $items = null;
        }
        return view('pages.search', ['items'=>$items]);
    }

    public function post(Request $request) {
        $keyword = $request->keyword;
        $url = self::_MakeDetailsUrl($keyword);
        $items = self::_cURL_GetBooksDetails($items);

        return redirect('pages.add', $items);
    }

    private function _MakeSearchUrl($keyword) {
        $baseurl    ='https://www.googleapis.com/books/v1/volumes';
        $params     =array();
        $params['key']  ='AIzaSyA9Op-DQj4a5mVsdMpjX3oigLizGGF65cM';
        $params['q']    =$keyword;

        ksort($params);

        $canonical_string='';
        foreach($params as $k => $v) {
            $canonical_string .= '&'.rawurlencode($k).'='.rawurlencode($v);
        }
        $canonical_string=substr($canonical_string,1);

        $url=$baseurl.'?'.$canonical_string;

        return $url;
    }

    private function _cURL_GetSearch($url) {
        $MediumImage = '';
        $booksList = [];

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

        for($i = 0; $i < 10; $i++){
            $retArray = new \stdClass();
            $retArray->title='';
            $retArray->subtitle='';
            $retArray->isbn10=null;
            $retArray->isbn13=null;
            $retArray->authors=[];
            $retArray->publisher='';
            $retArray->publishedDate='';
            $retArray->deskription=null;
            $retArray->thumbnail='';
            $retArray->previewLink='';
            //$retArray->ResultXML = $result;

            $obj2 = $obj["items"][$i];


            $retArray->title = $obj2["volumeInfo"]["title"];
            if(isset($obj2["volumeInfo"]["subtitle"])){
                $retArray->subtitle = $obj2["volumeInfo"]["subtitle"];
            }
            if(isset($obj2["volumeInfo"]["authors"])){
                $retArray->authors = $obj2["volumeInfo"]["authors"];
            }
            if(isset($obj2["volumeInfo"]["publisher"])){
                $retArray->publisher = $obj2["volumeInfo"]["publisher"];
            }
            if(isset($obj2["volumeInfo"]["imageLinks"])){
                $retArray->thumbnail = $obj2["volumeInfo"]["imageLinks"]["thumbnail"];
            }
            $retArray->previewLink = $obj2["volumeInfo"]["previewLink"];

            $booksList[] = $retArray;
        }

        return $booksList;
    }
}
