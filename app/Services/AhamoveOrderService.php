<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AhamoveOrderService
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

    public function getOrders()
    {
        try {
            $response = $this->client->get('/v1/order/list', [
                'query' => [
                    'country_id' => $this->country_id,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getOrderDetails($orderId)
    {
        // Gửi yêu cầu lấy thông tin chi tiết đơn hàng
    }

    public function createOrder($service_id, $paymentMethod, $promoCode, $orderData)
    {
        try {
            $response = $this->client->post("{$this->apiUrl}/v1/order/create", [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => $orderData,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function cancelOrder($token, $orderId, $comment, $cancelCode)
    {
        try {
            $response = $this->client->get("{$this->apiUrl}/v1/order/cancel", [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    ''=> quoted_printable_decode($token),
                    'order_id' => $orderId,
                    'comment' => $comment,
                    'cancel_code' => $cancelCode,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getTrackingLink($orderId)
    {
        // Gửi yêu cầu lấy liên kết theo dõi đơn hàng
        try {
            $response = $this->client->get("{$this->apiUrl}/v1/order/shared_link", [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'order_id' => $orderId,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function rateDriver($token, $orderId, $rating, $comment = null)
    {
        // Gửi yêu cầu đánh giá tài xế
        try {
            $response = $this->client->get("{$this->apiUrl}/v1/order/rate_supplier", [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'token' => $token,
                    'order_id' => $orderId,
                    'rating' => $rating,
                    'comment' => $comment,
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
