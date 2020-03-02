<?php

namespace App\Http\Controllers;

use App\scrapingRssModel;
use Goutte\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;


class ScrapingDataController extends Controller
{
    Public function StoreFeeds(Client $client, Request $request){
        /*This function read and print the important tags of a xml rss feed by url post method.
        You need to send a url in json format with insomnia or postman through a post method to the url: localhost/scrapingdata*/
        $url = $request->get('url');

        $crawler =$client->request('GET', $url);
        $crawler->filter('item')->each(function(Crawler $feedNode){

            $titleNode = $feedNode -> filter('title')->first();
            $linkNode = $feedNode -> filter('link')->first();
            $descriptionNode = $feedNode -> filter('description')->first();
            $pubDateNode = $feedNode -> filter('pubDate')->first();
            $categoryNode = $feedNode -> filter('category')->first();


            $feedResult = $titleNode -> text()."<br>".$linkNode->text()."<br>".$descriptionNode->text()."<br>".$pubDateNode->text()."<br>".$categoryNode->text()."<br>"."<br>";
            echo $feedResult;

                $createFeed = scrapingRssModel::create([
                    'title' => $titleNode->text(),
                    'link' => $linkNode->text(),
                    'description' => $descriptionNode->text(),
                    'pubDate' => $pubDateNode->text(),
                    'category' => $categoryNode->text()
                ]);
        });
    }

    public function showAll (){
        /*Function to show all feeds in data base. To show all it is necessary to do a request GET from a
        postman,insomnia or in your browser to localhost/scrapingdata/show  */
        $getFeeds = scrapingRssModel::all();
        return \response()->json($getFeeds);

    }
    public function showById ($id){
        /*If you want to search and visualize a single feed you can pass the id through the url to show it
        example: localhost/scrapingdata/show/3 */

        $getFeeds = scrapingRssModel::find($id);
        return \response()->json($getFeeds);

    }

    public function destroy($id){
        /*Function to destroy rss feed from database. To erase it is necessary to pass the
        feed id by sending a DELETE type request through postman or insomnia*/

        $deleteFeeds = scrapingRssModel::find($id);
        $deleteFeeds -> delete();

    }

}
