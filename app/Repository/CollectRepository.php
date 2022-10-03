<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Collect;

class CollectRepository
{
    public function addCollect($request)
    {
        $mId = $request->mId;
        $rId = $request->rId;

        $exist = DB::select("SELECT * From `collect` WHERE `mId` = '$mId' AND `rId` = '$rId'");
        if($exist == null){
            $bool = DB::insert('insert into collect (mId,rId) values (?, ?)', array($mId, $rId));
            return $bool;
        }
        
    }
     //顯示會員所有收藏
  public function getAllCollects($request)
  {
    return DB::select("SELECT * From `collect` WHERE `mId` = $request->mId");
  }
  //顯示會員指定收藏
  public function getACollect($request)
  {
    return DB::select("SELECT * From `recipe` WHERE `rId` = $request->rId");
  }
  //刪除收藏
  public function deleteCollect($request){
    $bool= DB::select("DELETE From `collect` WHERE `rId` = $request->rId AND `mId` = $request->mId");
    return $bool;
  }

    

}
?>