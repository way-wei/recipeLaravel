<?php

namespace App\Service;

use App\Repository\RecipeRepository;

class RecipeService
{
  private $recipeRepository;

  public function __construct(RecipeRepository $recipeRepository)
  {
    $this->recipeRepository = $recipeRepository;
  }
  public function getrId(){
    $Recipes = $this->recipeRepository->getrId();
    return $Recipes;
  }
  // 查詢所有食譜
  public function getAllRecipes()
  {
    $recipes = $this->recipeRepository->getAllRecipes();
    return $recipes;
  }

  public function getRecipeInfo($request){
    $recipes = $this->recipeRepository->getRecipeInfo($request);
    return $recipes;
  }

  public function searchRecipe($request){
    $recipes = $this->recipeRepository->searchRecipe($request);
    return $recipes;
  }
  //顯示會員食譜
  public function getMemberRecipes($request)
  {
    $recipes = $this->recipeRepository->getMemberRecipes($request);
    return $recipes;
  }
  //顯示會員指定食譜
  public function getMemberARecipe($request)
  {
    $recipes = $this->recipeRepository->getMemberARecipe($request);
    return $recipes;
  }

   //新增成員
   public function insertRecipe($request){
    $isSuccess=$this->recipeRepository->insertRecipe($request);
    if($isSuccess){
        return '新增成功';
    }
    else{
        return '新增失敗';
    }
  }

    //修改成員
    public function updateRecipe($request){
      $isSuccess=$this->recipeRepository->updateRecipe($request);
      if($isSuccess){
          return '修改成功';
      }
      else{
          return '修改失敗';
      }
  }
  //刪除成員
  public function deleteRecipe($request){
    $isSuccess=$this->recipeRepository->deleteRecipe($request);
    if($isSuccess){
        return '刪除成功';
    }
    else{
        return '刪除失敗';
    }
  }

}

?>