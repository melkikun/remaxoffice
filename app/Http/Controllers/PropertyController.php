<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class PropertyController extends Controller {

    private $client;
    private $request;
    private $api;

    function __construct(Request $request, Api $api) {
        $this->api = $api;
        $this->request = $request;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
    }

    function listProperty($account, $param) {
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyApi = $this->client->get("listing", ["query" => ['filter[listUrl]' => "'$param'"]]);
                $propertySuggestApi = $this->client->get("listing", ["query" => ['filter[frofId]' => "$id", 'pageNumber' => "1", 'pageSize' => '10']]);
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    $propertySuggest = json_decode($propertySuggestApi->getBody()->getContents(), true);
                    if ($property['data'] != null)
                        return view("property_detail", compact('office', 'property', 'propertySuggest'));
                    else
                        abort("404");
                } else {
                    abort("404");
                }
            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    abort("404");
                } else {
                    echo Psr7\str($e->getRequest());
                }
            }
        }
    }

    function search($account) {
        $keyword = addslashes($this->request->input("keyword"));
        $location = addslashes(htmlspecialchars($this->request->input("location")));
        $type = addslashes($this->request->input("type"));
        $sale = addslashes($this->request->input("sale"));
        $min = addslashes(str_replace('.', '', $this->request->input("min")));
        $max = addslashes(str_replace('.', '', $this->request->input("max")));
        $bed = addslashes($this->request->input("bed"));
        $bath = addslashes($this->request->input("bath"));
        $land = addslashes($this->request->input("land"));
        $building = addslashes($this->request->input("building"));
        $facility = addslashes($this->request->input("facility"));
        $currentPage = addslashes($this->request->input('page'));
        if ($currentPage == "") {
            $currentPage = 1;
        }
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $filterId = "filter[frofId]=$id";

                if ($bed != "") {
                    $filterBed = "&filter[listBedroom]=$bed";
                } else {
                    $filterBed = "";
                }
                if ($bath != "") {
                    $filterBath = "&filter[listBathroom]=$bath";
                } else {
                    $filterBath = "";
                }
                if ($min != "") {
                    $filterMin = "&filter[listListingPrice][gte]=$min";
                } else {
                    $filterMin = "";
                }
                if ($max != "") {
                    $filterMax = "&filter[listListingPrice][lte]=$max";
                } else {
                    $filterMax = "";
                }
                if ($type != "") {
                    $filterType = "&filter[listPropertyTypeId]=$type";
                } else {
                    $filterType = "";
                }
                if ($sale != "") {
                    $filterSale = "&filter[listListingCategoryId]=$sale";
                } else {
                    $filterSale = "";
                }
                if ($keyword != "") {
                    $filterKeyword = "&filter[listTitle]=%27%25$keyword%25%27";
                } else {
                    $filterKeyword = "";
                }
                if ($land != "") {
                    $filterLand = "&filter[listLandSize][gte]='$land'";
                } else {
                    $filterLand = "";
                }
                if ($building != "") {
                    $filterBuilding = "&filter[listBuildingSize][gte]='$building'";
                } else {
                    $filterBuilding = "";
                }
                if ($location != "") {
                    $filterLocation = "&filter[mctyDescription]=%27%25$location%25%27";
                } else {
                    $filterLocation = "";
                }
                if ($facility != "") {
                    $facility = "&filter[listFacility]=%27%25$facility%25%27";
                } else {
                    $facility = "";
                }
                $filterPage = "&pageNumber=$currentPage";
                $filterpageSize = "&pageSize=12";
                $filterTotal = $filterId . $filterBed . $filterBath . $filterMin . $filterMax . $filterType . $filterSale . $filterKeyword . $filterLand . $filterBuilding . $filterLocation . $facility;

                $filterHalaman = $filterTotal . $filterPage . $filterpageSize;
                // echo $filterHalaman;
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyTotalApi = $this->client->get("listing?" . $filterTotal);
                $propertyApi = $this->client->get("listing?" . $filterHalaman);
                $facilityApi = $this->client->get("facility");
                $listingcategoryApi = $this->client->get("listingcategory");
                $propertytypeApi = $this->client->get("propertytype");
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200 && $propertyTotalApi->getStatusCode() == 200 && $currentPage != "") {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $propertyTotal = json_decode($propertyTotalApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    $facility = json_decode($facilityApi->getBody()->getContents(), true);
                    $propertytype = json_decode($propertytypeApi->getBody()->getContents(), true);
                    $listingcategory = json_decode($listingcategoryApi->getBody()->getContents(), true);
                    return view("property_search", compact('office', 'property', 'propertyTotal', 'currentPage', 'facility', 'listingcategory', 'propertytype'));
                } else {
                    return view('property_not_found');
                }
            } catch (RequestException $e) {
                if ($e->hasResponse()) {
                    abort("404");
                } else {
                    echo Psr7\str($e->getRequest());
                }
            }
        }
    }

}
