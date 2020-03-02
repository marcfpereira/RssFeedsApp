<?php

namespace App\Http\Controllers;

use App\UrlModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class rssUrlStoreController extends Controller
{
    public function storeUrl(Request $request){


        $url = $request -> get('url');
        $website = $request -> get ('website');

                $urlStore = UrlModel::create([

                    'url' => $url,
                    'website' => $website

                ]);

                if(isset($urlStore)){
                    return response()->json($urlStore, Response::HTTP_OK);
                }
            }
    //In this function show all urlStore table.
    public function getUrl(){
        $url = UrlModel::all('url');
        return response()->json($url);
    }
//In this function show by $id urlStore table.
    public function getUrlByid($id){
        $url = UrlModel::find($id);
        return response()->json($url);
    }

}
