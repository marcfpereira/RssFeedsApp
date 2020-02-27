<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlModel extends Model
{
    protected $table = 'urlStore';

    protected $fillable = ['id', 'url','website'];


}
