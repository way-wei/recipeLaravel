<?php

namespace App\Service;

use App\Repository\CollectRepository;

class CollectService
{
  private $collectRepository;

  public function __construct(CollectRepository $collectRepository)
  {
    $this->collectRepository = $collectRepository;
  }

  public function addCollect($request)
  {
    $success = $this->collectRepository->addCollect($request);
    if($success){
        return "T";
    }
    else{
        return "F";
    }
  }
  //顯示會員收藏
  public function getAllCollects($request)
  {
    $collect = $this-> collectRepository->getAllCollects($request);
    return $collect;
  }
  //顯示會員指定收藏
  public function getACollect($request)
  {
    $collect = $this->collectRepository->getACollect($request);
    return $collect;
  }
  //刪除收藏
  public function deleteCollect($request){
    $success=$this->collectRepository->deleteCollect($request);
    if($success){
      return "T";
  }
  else{
      return "F";
  }
  }

}

?>