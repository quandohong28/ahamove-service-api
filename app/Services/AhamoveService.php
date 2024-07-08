<?php

namespace App\Services;

use GuzzleHttp\Client;

class AhamoveService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.ahamove.com',
        ]);
    }

    public function createOrder($orderData)
    {
        // Gửi yêu cầu tạo đơn hàng
    }

    public function cancelOrder($orderId)
    {
        // Gửi yêu cầu hủy đơn hàng
    }

    public function getOrderList()
    {
        // Gửi yêu cầu lấy danh sách đơn hàng
    }

    public function getOrderDetails($orderId)
    {
        // Gửi yêu cầu lấy thông tin chi tiết đơn hàng
    }

    public function getTrackingLink($orderId)
    {
        // Gửi yêu cầu lấy liên kết theo dõi đơn hàng
    }

    public function rateDriver($orderId, $rating)
    {
        // Gửi yêu cầu đánh giá tài xế
    }
}
