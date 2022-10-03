<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Record;

class RecordRepository
{
    public function addRecord($request)
    {
        $bool = Record::create(
            ["tId" => $request -> tId,
            "pId" => $request -> pId,
            "amount" => $request -> amount,
            "sum" => $request -> sum]
        );
        return $bool;
    }
    
    public function getAllRecord($request)
    {
        return Record::where('tId', '=', $request -> tId)->get();
    }
    

}
?>