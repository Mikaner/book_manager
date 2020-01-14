<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publisher';
    protected $guarded = 'publisher_id';

    public static $rules = array(
        'publisher_name' => 'required'
    );
}
