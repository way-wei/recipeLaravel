<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\StepService;

class StepController extends Controller
{
    private $stepService;

    // 建構子
    public function __construct(StepService $stepService)
    {
        $this->stepService = $stepService;
    }

    public function getItemStep(Request $request)
    {
        return $this->stepService->getItemStep(Json_decode($request -> getContent()));
    }
    // 顯示食譜步驟
    public function getAllStep(Request $request){
        return $this->stepService->getAllStep(Json_decode($request->getContent()));
    }
    
    //新增食譜步驟
    public function insertStep(Request $request)
    {
        return $this->stepService->insertStep(Json_decode($request->getContent()));
    }

    //修改食譜步驟
    public function updateStep(Request $request)
    {
        return $this->stepService->updateStep(Json_decode($request->getContent()));    
    }

    //刪除食譜步驟
    public function deleteStep(Request $request)
    {
        return $this->stepService->deleteStep(Json_decode($request->getContent()));    
    }
}

?>