<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CartService;

class CartController extends Controller
{
    private $cartService;

    // 建構子
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // 查詢所有成員
    public function getCartId(Request $request)
    {
        return $this->cartService->getCartId(Json_decode($request -> getContent()));
    }

    public function addCart(Request $request)
    {
        return $this->cartService->addCart(Json_decode($request -> getContent()));
    }

}

?>