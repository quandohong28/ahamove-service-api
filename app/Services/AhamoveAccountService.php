<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AhamoveAccountService
{
    protected $client;

    protected $apiUrl;

    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('ahamove.api_url');
        $this->apiKey = config('ahamove.api_key');

        $this->client = new Client([
            'base_uri' => $this->apiUrl
        ]);
    }

    public function createAccount($mobile, $name, $email, $address, $lat, $lng)
    {
        try {
            $response = $this->client->post("{$this->apiUrl}/v1/account/create", [
                'headers' => [],
                'query' => [
                    'api_key' => $this->apiKey,
                    'mobile' => $mobile,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'lat' => $lat,
                    'lng' => $lng
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function addChildAccount()
    {
    }

    public function activeChildAccount()
    {
    }

    public function deleteChildAccount()
    {
    }

    public function getChildAccounts()
    {
    }

    public function updateChildAccount()
    {
    }
}
