<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecipeRepository
{
    public function getAllRecipes()
    {
        return Recipe::all();
    }

    public function getRecipeInfo($request){
        return Recipe::where('rId', '=', $request -> id)->get();
    }

    public function searchRecipe($request){
        $category = $request -> category;
        $time = $request -> time;
        $serving = $request -> serving;

        if($category == "全部" && $time == "全部" && $serving != "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `serving` = '$serving'");
        }
        elseif($category == "全部" && $time != "全部" && $serving != "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `serving` = '$serving' AND `rTime` = '$time'");
        }
        elseif($category == "全部" && $time != "全部" && $serving == "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `rTime` = '$time'");
        }
        elseif($category != "全部" && $time == "全部" && $serving == "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `cId` = '$category'");
        }
        elseif($category != "全部" && $time != "全部" && $serving == "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `cId` = '$category' AND `rTime` = '$time'");
        }
        elseif($category != "全部" && $time == "全部" && $serving != "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `cId` = '$category' AND `serving` = '$serving'");
        }
        elseif($category != "全部" && $time != "全部" && $serving != "全部"){
            $search = DB::select("SELECT * From `recipe` WHERE `cId` = '$category' AND `serving` = '$serving' AND `rTime` = '$time'");
        }
        elseif($category == "全部" && $time == "全部" && $serving == "全部"){
            $search = Recipe::all();
        }

        return $search;
    }
  //取得食譜最大rId
  public function getrId()
  {
    return DB::select("SELECT MAX(`rId`) as `rId` From `recipe`");
  }
  //顯示會員所有食譜
  public function getMemberRecipes($request)
  {
    return DB::select("SELECT * From `recipe` WHERE `mId` = $request->mId");
  }
  //顯示會員指定食譜
  public function getMemberARecipe($request)
  {
    return DB::select("SELECT * From `recipe` WHERE `rId` = $request->rId");
  }
  //新增食譜
  public function insertRecipe($request){
    $data = explode(',', $request->cover);//去掉開頭data:image/jpg;base64
    $myrId=$request->rId+1;
    $bool=Recipe::create([
      'rId' =>$myrId,
      'rName'=>$request->rName, 
      'intro'=>$request->intro, 
      'serving'=>$request->serving, 
      'rTime'=>$request->rTime,
      'mId'=>$request->mId, 
      'cId'=>$request->cId, 
      'OriginalPrice'=>$request->OriginalPrice,      
    ]);
    $coverImg=base64_decode($data[1]);//將base64解碼
    $storagePath=Storage::put('//recipe//'.$myrId.'.jpg',$coverImg);
    return $bool;
  }

  //修改食譜
  public function updateRecipe($request){  
    $res=Recipe::where('rId','=',$request->rId)->update(
      [
        'rName'=>$request->rName, 
        'intro'=>$request->intro, 
        'serving'=>$request->serving, 
        'rTime'=>$request->rTime,
        'cId'=>$request->cId, 
      ]   
    ); 
    return $res;
  }

  //刪除食譜
  public function deleteRecipe($request){
    $res=Recipe::where('rId','=',$request->rId)->delete();
    return $res;
  }
  




}
?>