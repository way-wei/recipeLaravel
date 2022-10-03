<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    // 建構子
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // 查詢所有成員
    public function getCategoryId(Request $request)
    {
        return $this->categoryService->getCategoryId(Json_decode($request -> getContent()));
    }

}

?>