<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\OrdersService;

class OrdersController extends Controller
{
    private $ordersService;

    // 建構子
    public function __construct(OrdersService $ordersService)
    {
        $this->ordersService = $ordersService;
    }

    // 查詢所有成員
    public function getOrdersItem(Request $request)
    {
        return $this->ordersService->getOrdersItem(Json_decode($request -> getContent()));
    }

    public function deleteOrdersItem(Request $request)
    {
        return $this->ordersService->deleteOrdersItem(Json_decode($request -> getContent()));
    }

    public function updateOrdersItemF(Request $request)
    {
        return $this->ordersService->updateOrdersItemF(Json_decode($request -> getContent()));
    }

    public function updateOrdersItemT(Request $request)
    {
        return $this->ordersService->updateOrdersItemT(Json_decode($request -> getContent()));
    }

    public function addOrder(Request $request)
    {
        return $this->ordersService->addOrder(Json_decode($request -> getContent()));
    }

    public function updateOrderPlus(Request $request)
    {
        return $this->ordersService->updateOrderPlus(Json_decode($request -> getContent()));
    }

    public function updateOrderMinus(Request $request)
    {
        return $this->ordersService->updateOrderMinus(Json_decode($request -> getContent()));
    }

    public function getCheckedOrder(Request $request)
    {
        return $this->ordersService->getCheckedOrder(Json_decode($request -> getContent()));
    }

    public function deleteOrder(Request $request)
    {
        return $this->ordersService->deleteOrder(Json_decode($request -> getContent()));
    }

}

?>