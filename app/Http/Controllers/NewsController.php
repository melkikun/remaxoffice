<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;
use Session;

class NewsController extends Controller {

    private $client;
    private $api;
    private $request;

    function __construct(Api $api, Request $request) {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
        $this->request = $request;
    }

    function listNews($account, $param) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $newsDetailApi = $this->client->get("webnews/$param", ["query" => ['language' => $lang]]);
                $newsApi = $this->client->get("webnews");
                if ($newsDetailApi->getStatusCode() == 200 && $newsApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $detail = json_decode($newsDetailApi->getBody()->getContents(), true);
                    $news = json_decode($newsApi->getBody()->getContents(), true);
                    return view("news_detail", compact('id', 'detail', 'news', 'office'));
                } else {
                    abort("404");
                }
            } catch (RequestException $e) {
                if ($e->getResponse()->getStatusCode() != '200') {
                    abort("404");
                }
            }
        }
    }

    public function cekLang($input) {
        if ($input == "") {
            if ($this->request->session()->has('lang')) {
                $this->request->session()->put('lang', Session::get("lang"));
            } else {
                Session::put("lang", "id_ID");
            }
        } else {
            Session::put("lang", $input);
        }
        return $this->request->session()->get("lang");
    }

}
