<?php

namespace App\Service;

use App\Repository\CartRepository;

class CartService
{
  private $cartRepository;

  public function __construct(CartRepository $cartRepository)
  {
    $this->cartRepository = $cartRepository;
  }

  public function getCartId($request)
  {
    $cart = $this->cartRepository->getCartId($request);
    return $cart;
  }

  public function addCart($request)
  {
    $cart = $this->cartRepository->addCart($request);
    return $cart;
  }

}

?>