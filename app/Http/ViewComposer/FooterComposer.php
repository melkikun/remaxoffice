<?php

namespace App\Http\ViewComposer;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use App\Http\Helpers\Api;
class FooterComposer {

 	private $client;
    private $api;
    private $request;

    function __construct(Request $request, Api $api) {
    	$this->request = $request;
        $this->api = $api;
        $this->client = new GuzzleHttpClient(['base_uri' =>$this->api->getBaseUri(), 'verify' => false]);
    }

    public function compose(View $view) {
    	$companyApi = $this->client->get("company");
    	$company = json_decode($companyApi ->getBody()->getContents(), true);
        $view->with("footer")->with(["company"=>$company]);
    }



}
