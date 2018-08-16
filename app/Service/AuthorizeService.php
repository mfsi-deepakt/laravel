<?php

namespace App\Service;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthorizeService
{	
	protected $url;
	protected $auth;
	protected $client;

	public function __construct()
	{
		$this->url = env('AUTHRIZE_URL');
		$this->auth = [
			"name" => env('AUTHRIZE_ID'),
			"transactionKey" => env('AUTHRIZE_TRANSACTION_KEY')
		];
        $this->client = new Client();
	}

	public function clientRequest($content)
	{
		$response = $this->client->request('POST', $this->url, ['json' => $content]);
		return $response;
	}
	
	public function getCustomer($id) 
	{
		$content = [
			"getCustomerProfileRequest" => [
				"merchantAuthentication" => $this->auth,
			"customerProfileId" => "1505063398",
			"includeIssuerInfo" => "true" 
		]];

		return json_decode($this->clientRequest($content),true);
	}

	public function createPaymentProfile($data)
	{
		$content = $data;
		return json_decode($this->clientRequest($content),true);
	}

	public function createCustometProfile($content) 
	{

	}
}