<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AhamoveBaseService
{
    protected $client;

    protected $apiUrl;

    protected $apiKey;

    protected $country_id;

    public function __construct()
    {
        $this->apiUrl = config('ahamove.api_url');
        $this->apiKey = config('ahamove.api_key');
        $this->country_id = config('ahamove.country_id');

        $this->client = new Client([
            'base_uri' => $this->apiUrl
        ]);
    }

    /**
     * Lấy danh sách thành phố theo quốc gia
     * @param mixed $countryId
     * @return mixed
     */
    public function getCities($countryId)
    {
        try {
            $response = $this->client->get('/v1/order/cities', [
                'query' => [
                    'country_id' => $countryId,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Lấy thông tin chi tiết thành phố
     * @param mixed $cityId
     * @return mixed
     */
    public function getCityDetail($cityId)
    {
        try {
            $response = $this->client->get('/v1/order/city_detail?city_id=' . $cityId);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Lấy danh sách dịch vụ theo thành phố
     * @param mixed $cityId
     * @return mixed
     */
    public function getServices($cityId)
    {
        try {
            $response = $this->client->get('/v1/order/service_types', [
                'header' => [
                    'Content-Type' => 'application/json'
                ],
                'query' => [
                    'city_id' => $cityId
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function calOrderFee()
    {
    }
}
