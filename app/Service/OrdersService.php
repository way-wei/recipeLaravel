<?php

namespace App\Service;

use App\Repository\OrdersRepository;

class OrdersService
{
  private $ordersRepository;

  public function __construct(OrdersRepository $ordersRepository)
  {
    $this->ordersRepository = $ordersRepository;
  }

  public function getOrdersItem($request)
  {
    $orders = $this->ordersRepository->getOrdersItem($request);
    return $orders;
  }

  public function deleteOrdersItem($request)
  {
    $isSuccess = $this->ordersRepository->deleteOrdersItem($request);
    if($isSuccess){
      return 'T';
    }
    else{
        return 'F';
    }
  }

  public function updateOrdersItemF($request)
  {
    $isSuccess = $this->ordersRepository->updateOrdersItemF($request);
    if($isSuccess){
      return 'T';
    }
    else{
        return 'F';
    }
  }

  public function updateOrdersItemT($request)
  {
    $isSuccess = $this->ordersRepository->updateOrdersItemT($request);
    if($isSuccess){
      return 'T';
    }
    else{
        return 'F';
    }
  }

  public function addOrder($request)
  {
    $order = $this->ordersRepository->addOrder($request);
    return $order;
  }

  public function updateOrderPlus($request)
  {
    $order = $this->ordersRepository->updateOrderPlus($request);
    return $order;
  }

  public function updateOrderMinus($request)
  {
    $order = $this->ordersRepository->updateOrderMinus($request);
    return $order;
  }

  public function getCheckedOrder($request)
  {
    $order = $this->ordersRepository->getCheckedOrder($request);
    return $order;
  }

  public function deleteOrder($request)
  {
    $order = $this->ordersRepository->deleteOrder($request);
    return $order;
  }

}

?>