<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tweet extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','body'];

    public static $rules = array(
        'body' => ['required','max:255'],
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
