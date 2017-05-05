<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class GalleryController extends Controller {

    private $client;
    private $api;

    function __construct(Api $api) {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
    }

    function listDetail($account, $param) {
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                 $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $galleryDetailApi = $this->client->get("webgallerydetail", ["query" => ['filter[wbgaWbgyId]' => $param]]);
                if ($galleryDetailApi->getStatusCode() == 200) {
                     $office = json_decode($officeApi->getBody()->getContents(), true);
                    $detail = json_decode($galleryDetailApi->getBody()->getContents(), true);
                    return view("gallery_detail", compact('id', 'detail', 'office'));
                } else {
                    abort("404");
                }
            } catch (RequestException $e) {
                if ($e->getResponse()->getStatusCode() != '200') {
                    if ($e->hasResponse()) {
                        abort("404");
                    } else {
                        echo Psr7\str($e->getRequest());
                    }
                }
            }
        }
    }
}
