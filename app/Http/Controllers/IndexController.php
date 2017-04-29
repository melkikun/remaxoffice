<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;
use Session;

class IndexController extends Controller {

    private $client;
    private $api;
    private $request;

    public function __construct(Api $api, Request $request) {
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
        $this->request = $request;
    }

    function index($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $bankApi = $this->client->get("bank");
                if ($bankApi->getStatusCode() == 200  && $officeApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $bank = json_decode($bankApi->getBody()->getContents(), true);
                    return view("home", compact('office', 'bank'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function about($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $aboutApi = $this->client->get("webabout");
                if ($officeApi->getStatusCode() == 200 && $aboutApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $about = json_decode($aboutApi->getBody()->getContents(), true);
                    return view("about", compact('office', 'about'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function agent($account) {
        $first = 1;
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $agentApi = $this->client->get("membership", ["query" => ['filter[msfcFrofId]' => "$id"]]);
                $agentInfoApi = $this->client->get("webagentinformation", ["query" => ['wbinFrofId' => "$id"]]);
                if ($officeApi->getStatusCode() == 200 && $agentApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $agent = json_decode($agentApi->getBody()->getContents(), true);
                    $agentInfo = json_decode($agentInfoApi->getBody()->getContents(), true);
                    return view("agent", compact('office', 'agent', 'agentInfo', 'first'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function franchise($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $franchiseApi = $this->client->get("webfranchise");
                if ($officeApi->getStatusCode() == 200 && $franchiseApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $franchisex = json_decode($franchiseApi->getBody()->getContents(), true);
                    return view("franchise", compact('office', 'franchisex'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function gallery($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $galleryApi = $this->client->get("webgallery");
                if ($officeApi->getStatusCode() == 200 && $galleryApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $gallery = json_decode($galleryApi->getBody()->getContents(), true);
                    return view("gallery", compact('office', 'gallery'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function news($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $newsApi = $this->client->get("webnews");
                if ($officeApi->getStatusCode() == 200 && $newsApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $news = json_decode($newsApi->getBody()->getContents(), true);
                    return view("news", compact('office', 'news'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function property($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $currentPage =  $this->request->input('page');
                if($currentPage == ""){
                    $currentPage = 1;
                }
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyTotalApi = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyApi = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber'=>"$currentPage", 'pageSize'=>'12']]);
                $propertytype = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber'=>"$currentPage", 'pageSize'=>'12']]);
                $listingcategory = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber'=>"$currentPage", 'pageSize'=>'12']]);
                $listingcategory = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber'=>"$currentPage", 'pageSize'=>'12']]);
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200 && $propertyTotalApi->getStatusCode() == 200  && $currentPage != "") {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $propertyTotal = json_decode($propertyTotalApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    return view("property", compact('office', 'property','propertyTotal', 'currentPage'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function contact($account) {
        $lang = $this->cekLang($this->request->input("language"));
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $newsApi = $this->client->get("webnews");
                if ($officeApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    return view("contact", compact('office'));
                } else {
                    echo "Not Found";
                }
            } catch (RequestException $e) {
                echo Psr7\str($e->getRequest());
                if ($e->hasResponse()) {
                    echo Psr7\str($e->getResponse());
                }
            }
        }
    }

    public function cekLang($input){
        if ($input == "") {
            if($this->request->session()->has('lang')){
                $this->request->session()->put('lang', Session::get("lang"));
            }else{
                Session::put("lang", "id");
            }
        }else{
            Session::put("lang", $input);
        }
        return $this->request->session()->get("lang");
    }

}
