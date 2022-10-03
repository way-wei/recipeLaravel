<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Transaction;

class TransactionRepository
{
    public function getMaxId()
    {
        return DB::select("SELECT MAX(tId) AS 'MaxId' From `transaction`");
    }

    public function addTransaction($request)
    {
        date_default_timezone_set("Asia/Taipei");
        $bool=Transaction::create([
            'tId'=>$request->tId, 
            'method'=>$request->method, 
            'cardowner'=>$request->cardowner, 
            'cardkind'=>$request->cardkind, 
            'cardId'=>$request->cardId,
            'valid'=>$request->valid, 
            'pin'=>$request->pin,  
            'tDate'=>date("Y-m-d H:i:s"), 
            'address'=>$request->address,  
            'total'=>$request->total, 
            'fee'=>$request->fee,            
            'mId'=>$request->mId, 
            'cartId'=>$request->cartId,
        ]);
        return $bool;
    }

    public function getAllTransaction($request)
    {
        return Transaction::where('mId', '=', $request -> mId)->get();
    }

    public function getOneTransaction($request)
    {
        return Transaction::where('tId', '=', $request -> tId)->get();
    }
}
?>