<?php

namespace App\Service;

use App\Repository\IngredientsRepository;

class IngredientsService
{
    private $ingredientsRepository;

    public function __construct(IngredientsRepository $ingredientsRepository)
    {
        $this->ingredientsRepository = $ingredientsRepository;
    }

    public function getItemIngre($request){
        $ingredients = $this->ingredientsRepository->getItemIngre($request);
        return $ingredients;
    }
    // 顯示所有食材
  public function getAllIngredients($request)
  {
    $Recipes = $this->ingredientsRepository->getAllIngredients($request);
    return $Recipes;
  }

   //新增食譜食材
   public function insertIngredient($request){
    $isSuccess=$this->ingredientsRepository->insertIngredient($request);
    if($isSuccess){
        return '新增食材成功';
    }
    else{
        return '新增食材失敗';
    }
  }

    //修改食譜食材
    public function updateIngredient($request){
      $isSuccess=$this->ingredientsRepository->updateIngredient($request);
      if($isSuccess){
          return '修改成功';
      }
      else{
          return '修改失敗';
      }
  }
  
}

?>