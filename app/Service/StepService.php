<?php

namespace App\Service;

use App\Repository\StepRepository;

class StepService
{
    private $stepRepository;

    public function __construct(StepRepository $stepRepository)
    {
        $this->stepRepository = $stepRepository;
    }

    public function getItemStep($request){
        $step = $this->stepRepository->getItemStep($request);
        return $step;
    }

    // 顯示食譜步驟
    public function getAllStep($request)
    {
      $step = $this->stepRepository->getAllStep($request);
      return $step;
    }

    //新增食譜步驟
    public function insertStep($request){
      $isSuccess=$this->stepRepository->insertStep($request);
      if($isSuccess){
          return '新增步驟成功';
      }
      else{
          return '新增步驟失敗';
      }
    }

      //修改食譜步驟
      public function updateStep($request){
        $isSuccess=$this->stepRepository->updateStep($request);
        if($isSuccess){
            return '修改步驟成功';
        }
        else{
            return '修改步驟失敗';
        }
    }

    //刪除食譜步驟
    public function deleteStep($request){
      $isSuccess=$this->stepRepository->deleteStep($request);
      if($isSuccess){
          return '刪除步驟成功';
      }
      else{
          return '刪除步驟失敗';
      }
    }
}

?>