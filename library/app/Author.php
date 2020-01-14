<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'author';
    protected $guarded = 'author_id';

    public static $rules = array(
        'author_name' => 'required'
    );

    public function getData()
    {
        return $this->author_name;
    }
}
