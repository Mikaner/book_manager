<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    //
    protected $table = "book_author";
    protected $guarded = array('book_author_id');
    public static $rules = array(
        'book_id' => 'required',
        'author_id' => 'required'
    );

    public function getData()
    {
        return $this->book_id.':'.$this->author_id;
    }

    public function author()
    {
        return $this->hasOne('App\Author','author_id','author_id');
    }
}
