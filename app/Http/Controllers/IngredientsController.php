<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\IngredientsService;

class IngredientsController extends Controller
{
    private $ingredientsService;

    // 建構子
    public function __construct(IngredientsService $ingredientsService)
    {
        $this->ingredientsService = $ingredientsService;
    }

    public function getItemIngre(Request $request)
    {
        return $this->ingredientsService->getItemIngre(Json_decode($request -> getContent()));
    }
    // 顯示所有食材
    public function getAllIngredients(Request $request){
        return $this->ingredientsService->getAllIngredients(Json_decode($request->getContent()));
    }

    //新增成員
    public function insertIngredient(Request $request)
    {
        return $this->ingredientsService->insertIngredient(Json_decode($request->getContent()));
    }

    //修改成員
    public function updateIngredient(Request $request)
    {
        return $this->ingredientsService->updateIngredient(Json_decode($request->getContent()));    
    }

    //刪除成員
    public function deleteIngredient(Request $request)
    {
        return $this->ingredientsService->deleteIngredient(Json_decode($request->getContent()));    
    }
}

?>