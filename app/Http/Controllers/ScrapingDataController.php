<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use function MongoDB\BSON\toJSON;

class ScrapingDataController extends Controller
{
    Public function example(Client $client){
        $crawler =$client->request('GET','http://www.lavanguardia.com/mvc/feed/rss/vida/natural');
        $inlineDescription = 'description';
        $feed = $crawler->filter ($inlineDescription)->last();
        dd($feed->text());
    }

}
