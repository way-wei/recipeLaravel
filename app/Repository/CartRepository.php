<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;

class CartRepository
{
    public function getCartId($request)
    {
        return Cart::where('mId', '=', $request -> mId)->get();
    }

    public function addCart($request)
    {
        $mId = $request -> mId;
        $exist = DB::select("SELECT * From `cart` WHERE `mId` = '$mId'");
        if($exist == null){
            $bool = Cart::create([
                "mId" => $mId
            ]);
            return $bool;
        }
    }

}
?>