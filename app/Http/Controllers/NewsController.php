<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class NewsController extends Controller
{
   private $client;
    private $api;

    function __construct(Api $api) {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' =>$this->api->getBaseUri(), 'verify' => false]);
    }

    function listNews($account, $param){
        $id = $this->api->getOfficeInfo($account);
        if($id != ""){
             try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
            $newsDetailApi = $this->client->get("webnews/$param");
            $newsApi = $this->client->get("webnews");
            if($newsDetailApi->getStatusCode()== 200 && $newsApi->getStatusCode()== 200 ){
                 $office = json_decode($officeApi->getBody()->getContents(), true);
                $detail = json_decode($newsDetailApi ->getBody()->getContents(), true);
                $news = json_decode($newsApi ->getBody()->getContents(), true);
                return view("news_detail", compact('id', 'detail', 'news', 'office'));
            }else{
                echo "Not Found";
            }
        }catch (RequestException $e){
            echo Psr7\str($e->getRequest());
            if($e->hasResponse()){
                echo Psr7\str($e->getResponse());
            }
        }
        }
    }
}
