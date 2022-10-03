<?php

namespace App\Repository;
use App\Models\Ingredients;
use Illuminate\Support\Facades\DB;

class IngredientsRepository
{
    public function getItemIngre($request){
        return Ingredients::where('rId', '=', $request -> id)->get();
    }
    // 顯示所有食材
    public function getAllIngredients($request)
    {      
      return DB::select("SELECT * From `r_ingredients` WHERE `rId` = $request->rId");
    }

  //新增成員
  public function insertIngredient($request){
    $bool=Ingredients::create([
        'ingredient'=>$request->ingredient, 
        'amount'=>$request->amount, 
        'rId'=>$request->rId+1,      
    ]);
    return $bool;
    }

  //修改成員
  public function updateIngredient($request){
    $res=Ingredients::where('ingreId','=',$request->ingreId)->update(
      [
        'ingredient'=>$request->ingredient, 
        'amount'=>$request->amount, 
      ]   
    );
    return $res;
  }  
}
?>