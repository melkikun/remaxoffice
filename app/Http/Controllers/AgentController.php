<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class AgentController extends Controller {

    private $client;
    private $api;

    function __construct(Api $api, Request $request) {
        $this->request = $request;
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' => $this->api->getBaseUri(), 'verify' => false]);
    }

    function listAgent($account, $param) {
        $id = $this->api->getOfficeInfo($account);
        $idAgent = $this->findIdAgent($id, $param);
        if ($id != "" && $idAgent != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $agentDetail = $this->client->get("membership", ["query" => ['filter[msfcFrofId]' => "$id", 'filter[mmbsId]' => "'%$param%'"]]);
                $propertyApi = $this->client->get("listing", ["query"=>['filter[frofId]'=>"$id", 'filter[mmbsId]'=>$idAgent]]);
                if ($agentDetail->getStatusCode() == 200  && $propertyApi->getStatusCode() == 200 && $officeApi->getStatusCode() == 200) {
                    $detail = json_decode($agentDetail->getBody()->getContents(), true);
                    $property = json_decode($propertyApi ->getBody()->getContents(), true);
                    $office = json_decode($officeApi ->getBody()->getContents(), true);
                    return view("agent_detail", compact('id', 'office', 'property'));
                } else {
                    return view('agent_not_found');
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

    function findIdAgent($id, $param) {
        $idAgent = "";
        if ($id != "") {
            try {
                $agentDetail = $this->client->get("membership", ["query" => ['filter[mmbsFirstName]' => "'$param'"]]);
                if ($agentDetail->getStatusCode() == 200) {
                    $detail = json_decode($agentDetail->getBody()->getContents(), true);
                    if (count($detail['data']) > 0) {
                        foreach ($detail['data'] as $key => $value) {
                            $idAgent = $value['id'];
                        }
                    } else {
                        $idAgent = "";
                    }
                } else {
                    $idAgent = "";
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
        }else{
           abort("404");
        }
        return $idAgent;
    }

    function alphabethAgent($account){
        $param = addslashes($this->request->input('agents'));
        $id = $this->api->getOfficeInfo($account);
        if($param == "All"){
            $param = "%";
        }
        if ($id != "") {
            try {
                $officeApi = $this->client->get("franchise", ["query" => ['filter[frofId]' => "$id"]]);
                $agentApi = $this->client->get("membership", ["query" => ['filter[msfcFrofId]' => "$id", 'filter[mmbsFirstName]' => "'$param%'"]]);
                $agentInfoApi = $this->client->get("webagentinformation", ["query" => ['wbinFrofId' => "$id"]]);
                if ($officeApi->getStatusCode() == 200 && $agentApi->getStatusCode() == 200) {
                    $office = json_decode($officeApi->getBody()->getContents(), true);
                    $agent = json_decode($agentApi->getBody()->getContents(), true);
                    $agentInfo = json_decode($agentInfoApi->getBody()->getContents(), true);
                    return view("agent", compact('office', 'agent', 'agentInfo'));
                } else {
                    return view('agent_not_found');
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