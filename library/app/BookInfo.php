<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookInfo extends Model
{
    //
    protected $table = 'books_information';
    protected $primaryKey = 'book_id';
    protected $guarded = array('book_id');

    public static $rules = array(
        'source_id' => 'required',
        'title' => 'required',
        'isbn10' => 'required',
        'isbn13' => 'required',
        'publisher_id' => 'required',
        'published_date' => 'required',
        'description' => 'required',
        'thumbnail' => 'required'
    );

    public function getData(){
        return $this->book_id. ': '. $this->title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getThubnailData(){
        return $this->thumbnail;
    }
    public function authors(){
        return $this->hasMany('App\BookAuthor','book_id','book_id');
    }

    public function publisher(){
        return $this->hasOne('App\Publisher');
    }
}
