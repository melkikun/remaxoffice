<?php

namespace App\Http\ViewComposer;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;

class HeaderComposer {

    private $client;
    private $api;
    private $request;

    function __construct(Request $request, Api $api) {
    	$this->request = $request;
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' =>$this->api->getBaseUri(), 'verify' => false]);
    }

    public function compose(View $view) {
    	$account =  ($this->request->route()->parameters('account')['account']);
    	$id = $this->api->getOfficeInfo($account);
    	$companyApi = $this->client->get("webmenu", ["query"=>['filter[wbmnTo]'=>"'O'"]]);
    	$company = json_decode($companyApi ->getBody()->getContents(), true);
        $view->with("header")->with(["header"=>$company]);
    }

}
