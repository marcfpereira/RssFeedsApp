<?php

namespace App\Http\Controllers;

use App\scrapingRssModel;
use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use function MongoDB\BSON\toJSON;

class ScrapingDataController extends Controller
{
    Public function StoreFeeds(Client $client){
        //this function read and print the important tags of a xml rss feed by url get method.

        $crawler =$client->request('GET','http://www.lavanguardia.com/mvc/feed/rss/vida/natural');
        $crawler->filter('item')->each(function(Crawler $feedNode){

            $titleNode = $feedNode -> filter('title')->first();
            $linkNode = $feedNode -> filter('link')->first();
            $descriptionNode = $feedNode -> filter('description')->first();
            $pubDateNode = $feedNode -> filter('pubDate')->first();
            $categoryNode = $feedNode -> filter('category')->first();


            $feedResult = $titleNode -> text()."<br>".$linkNode->text()."<br>".$descriptionNode->text()."<br>".$pubDateNode->text()."<br>".$categoryNode->text()."<br>"."<br>";
            echo $feedResult;

            $createFeed = scrapingRssModel::create([
                'title'=> $titleNode->text(),
                'link'=>$linkNode->text(),
                'description'=>$descriptionNode->text(),
                'pubDate'=>$pubDateNode->text(),
                'category'=>$categoryNode->text()
            ]);
        });




    }

    public function showAll (){
        $getFeeds = scrapingRssModel::all();
        return \response()->json($getFeeds);

    }
    public function showById ($id){
        $getFeeds = scrapingRssModel::find($id);
        return \response()->json($getFeeds);

    }

    public function destroy($id){

        $deleteFeeds = scrapingRssModel::find($id);
        $deleteFeeds -> delete();

    }

}
