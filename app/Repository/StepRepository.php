<?php

namespace App\Repository;
use App\Models\Step;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StepRepository
{
    public function getItemStep($request){
        return Step::where('rId', '=', $request -> id)->get();
    }
    //顯示食譜步驟
  public function getAllStep($request)
  {
    return DB::select("SELECT * From `r_step` WHERE `rId` = $request->rId");
  }

  //新增食譜步驟
  public function insertStep($request){
    $data = explode( ',', $request->steppic);
    $myrId=$request->rId+1;
    $bool=Step::create([
        'rId'=>$myrId, 
        'step'=>$request->step, 
    ]);
    $steppicImg=base64_decode($data[1]);//將base64解碼
    Log::debug($bool);
    $storagePath=Storage::put('//stepImg//'.$bool->stepId.'.jpg',$steppicImg);
    return $bool;
  }

  //修改食譜步驟
  public function updateStep($request){
    $res=Step::where('stepId','=',$request->stepId)->update(
      [
        'step'=>$request->step, 
      ]   
    );
    return $res;
  } 
  
  //刪除食譜步驟
  public function deleteStep($request){
    $res=Step::where('stepId','=',$request->stepId)->delete();
    return $res;
  }
}
?>