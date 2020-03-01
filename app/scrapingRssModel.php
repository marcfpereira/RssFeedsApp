<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class scrapingRssModel extends Model
{
    protected $table = 'rssFeedStore';

    protected $fillable = ['id','title', 'link','description','pubDate','category'];
}
