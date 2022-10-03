<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\sum_count;

class sum_countRepository
{
    public function addItemSum($request)
    {
        $bool=sum_count::create([
            'cartId'=>$request->cartId,
            'amount'=>$request->amount,
            'price'=>$request->price,
            'orderIdsum'=>$request->orderIdsum,
            'sum'=>$request->amount * $request->price
        ]);
        return $bool;
    }

    public function deleteItemSum($request)
    {
        return DB::delete("DELETE From `sum_count` WHERE `cartId` = $request->cartId AND `orderIdsum` = $request->orderIdsum");
    }

    public function getOrderSum($request)
    {
        return DB::select("SELECT SUM(sum) AS OrderSum From `sum_count` WHERE `cartId` = $request->cartId");
    }

    public function deleteAllItemSum($request)
    {
        return DB::delete("DELETE From `sum_count`");
    }
    
}
?>