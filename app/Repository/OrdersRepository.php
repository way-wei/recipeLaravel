<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Orders;

class OrdersRepository
{
    public function getOrdersItem($request)
    {
        return Orders::where('cartId', '=', $request -> cartId)->get();
    }

    public function deleteOrdersItem($request)
    {
        return DB::delete("DELETE From `orders` WHERE `cartId` = $request->cartId AND `orderId` = $request->orderId"); 
    }

    public function updateOrdersItemF($request)
    {
        return DB::update("UPDATE `orders` SET status = 'T' WHERE `cartId` = $request->cartId AND `orderId` = $request->orderId");
    }

    public function updateOrdersItemT($request)
    {
        return DB::update("UPDATE `orders` SET status = 'F' WHERE `cartId` = $request->cartId AND `orderId` = $request->orderId");
    }

    public function addOrder($request)
    {
        $cartId = $request -> cartId;
        $pId = $request -> pId;
        $quantity = $request -> quantity;

        $exist = DB::select("SELECT * From `orders` WHERE `cartId` = '$cartId' AND `pId` = '$pId'");

        if($exist == null){
            $bool = Orders::create([
            "cartId" => $cartId,
            "pId" => $pId,
            "quantity" => $quantity,
            "status" => "F"
            ]);
            return $bool;
        }

        else{
            $oldQuantity = DB::select("SELECT `quantity` From `orders` WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            foreach($oldQuantity as $old)
            {
                $oldQuantity =  $old->quantity;
            }
            $newQuantity = $oldQuantity + $quantity;
            $update = DB::update("UPDATE `orders` SET quantity = $newQuantity WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            return $update;
        }
    }

    public function updateOrderPlus($request)
    {
        $cartId = $request -> cartId;
        $pId = $request -> pId;

        $oldQuantity = DB::select("SELECT `quantity` From `orders` WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            foreach($oldQuantity as $old)
            {
                $oldQuantity =  $old->quantity;
            }
            $newQuantity = $oldQuantity + 1;
            $update = DB::update("UPDATE `orders` SET quantity = $newQuantity WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            return $update;
    }

    public function updateOrderMinus($request)
    {
        $cartId = $request -> cartId;
        $pId = $request -> pId;

        $oldQuantity = DB::select("SELECT `quantity` From `orders` WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            foreach($oldQuantity as $old)
            {
                $oldQuantity =  $old->quantity;
            }
            $newQuantity = $oldQuantity - 1;
            $update = DB::update("UPDATE `orders` SET quantity = $newQuantity WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
            return $update;
    }

    public function getCheckedOrder($request)
    {
        $cartId = $request -> cartId;
        return DB::select("SELECT * From `orders` WHERE `cartId` = '$cartId' AND `status` = 'T'");
    }

    public function deleteOrder($request)
    {
        $cartId = $request -> cartId;
        $pId = $request -> pId;
        return DB::select("DELETE From `orders` WHERE `cartId` = '$cartId' AND `pId` = '$pId'");
    }
}
?>