<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class PropertyController extends Controller
{
    private $client;
    private $request;
    private $api;

    function __construct(Request $request, Api $api) {
        $this->api = $api;
        $this->request = $request;
        $this->client = new GuzzleHttpClient(['base_uri' => "https://www.remax.co.id/prodigy/papi/", 'verify' => false]);
    }


    function listProperty($account, $param){
    	$id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyApi = $this->client->get("listing/$param");
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    return view("property_detail", compact('office', 'property'));
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

    function search($account){
        $keyword = $this->request->input("keyword");
        $location = $this->request->input("location");
        $type = $this->request->input("type");
        $sale = $this->request->input("sale");
        $min = $this->request->input("min");
        $max = $this->request->input("max");
        $bed = $this->request->input("bed");
        $bath = $this->request->input("bath");
        $land = $this->request->input("land");
        $building = $this->request->input("building");
        $facility = $this->request->input("facility");
        $currentPage =  $this->request->input('page');
        if($currentPage == ""){
            $currentPage = 1;
        }
        $id = $this->api->getOfficeInfo($account);
        if ($id != "") {
            try {
                $filterId = "filter[frofId]=$id";
                
                if($bed != ""){
                    $filterBed = "&filter[listBedroom]=$bed";
                }else{
                    $filterBed = "";
                }
                if($bath != ""){
                    $filterBath = "&filter[listBathroom]=$bath";
                }else{
                    $filterBath = "";
                }
                if($min != ""){
                    $filterMin = "&filter[listListingPrice][gte]=$min";    
                }else{
                    $filterMin="";
                }
                if($max != ""){
                    $filterMax = "&filter[listListingPrice][lte]=$max";    
                }else{
                    $filterMax="";
                }
                if($type != ""){
                    $filterType = "&filter[listListingCategoryId]=$type";
                }else{
                    $filterType = "";
                }
                if($sale != ""){
                    $filterSale = "&filter[listPropertyTypeId]=$sale";
                }else{
                    $filterSale = "";
                }
                if($keyword != ""){
                    $filterKeyword  = "&filter[listTitle]=%27%25$keyword%25%27";
                }else{
                    $filterKeyword = "";
                }
                if($land != ""){
                    $filterLand  = "&filter[listLandSize][gte]='$land'";
                }else{
                    $filterLand = "";
                }
                if($building != ""){
                    $filterBuilding  = "&filter[listBuildingSize][gte]='$building'";
                }else{
                    $filterBuilding = "";
                }
                if($location != ""){
                    $filterLocation  = "&filter[mctyDescription]=%27%25$location%25%27";
                }else{
                    $filterLocation = "";
                }
                if($facility != ""){
                    $facility  = "&filter[listFacility]=%27%25$facility%25%27";
                }else{
                    $facility = "";
                }
                $filterPage = "&pageNumber=$currentPage";
                $filterpageSize  = "&pageSize=12";
                $filterTotal = $filterId.$filterBed.$filterBath.$filterMin.$filterMax.$filterType.$filterSale.$filterKeyword.$filterLand.$filterBuilding.$filterLocation.$facility;
                
                $filterHalaman = $filterTotal.$filterPage.$filterpageSize;

                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $propertyTotalApi = $this->client->get("listing?".$filterTotal);
                $propertyApi = $this->client->get("listing?".$filterHalaman);
                if ($officeApi->getStatusCode() == 200 && $propertyApi->getStatusCode() == 200 && $propertyTotalApi->getStatusCode() == 200  && $currentPage != "") {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $propertyTotal = json_decode($propertyTotalApi->getBody()->getContents(), true);
                    $property = json_decode($propertyApi->getBody()->getContents(), true);
                    return view("property_search", compact('office', 'property','propertyTotal', 'currentPage'));
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
}
