<?php

namespace App\Http\Controllers;

use App\Services\AhamoveAccountService;
use App\Services\AhamoveBaseService;
use App\Services\AhamoveOrderService;
use Illuminate\Http\Request;

class TestAhamoveController extends Controller
{
    public $ahamoveAccountService;
    public $ahamoveBaseService;
    public $ahamoveOrderService;

    public function __construct()
    {
        $this->ahamoveAccountService = new AhamoveAccountService();
        $this->ahamoveBaseService = new AhamoveBaseService();
        $this->ahamoveOrderService = new AhamoveOrderService();
    }

    public function test()
    {
        $account = $this->ahamoveBaseService->getServices('HN');

        return $account;
    }
}
