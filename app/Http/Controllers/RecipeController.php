<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\RecipeService;

class RecipeController extends Controller
{
    private $recipeService;

    // 建構子
    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    // 查詢所有成員
    public function getAllRecipes()
    {
        return $this->recipeService->getAllRecipes();
        
    }

    public function getRecipeInfo(Request $request)
    {
        return $this->recipeService->getRecipeInfo(Json_decode($request -> getContent()));
    }

    public function searchRecipe(Request $request)
    {
        return $this->recipeService->searchRecipe(Json_decode($request -> getContent()));
    }
    //顯示會員食譜
    public function getMemberRecipes(Request $request)
    {
        return $this->recipeService->getMemberRecipes(Json_decode($request->getContent()));
    }
    //顯示會員指定食譜
    public function getMemberARecipe(Request $request)
    {
        return $this->recipeService->getMemberARecipe(Json_decode($request->getContent()));
    }
    //新增食譜
    public function insertRecipe(Request $request)
    {
        return $this->recipeService->insertRecipe(Json_decode($request->getContent()));
    }

    //修改食譜
    public function updateRecipe(Request $request)
    {
        return $this->recipeService->updateRecipe(Json_decode($request->getContent()));    
    }

    //刪除食譜
    public function deleteRecipe(Request $request)
    {
        return $this->recipeService->deleteRecipe(Json_decode($request->getContent()));    
    }

    //取得食譜rId
    public function getrId () {
        return $this->recipeService->getrId();
    }
}

?>