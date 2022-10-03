<?php

namespace App\Service;

use App\Repository\sum_countRepository;

class sum_countService
{
  private $sum_countRepository;

  public function __construct(sum_countRepository $sum_countRepository)
  {
    $this->sum_countRepository = $sum_countRepository;
  }

  public function addItemSum($request)
  {
    $sum_count = $this->sum_countRepository->addItemSum($request);
    return $sum_count;
  }

  public function deleteItemSum($request)
  {
    $sum_count = $this->sum_countRepository->deleteItemSum($request);
    return $sum_count;
  }

  public function getOrderSum($request)
  {
    $sum_count = $this->sum_countRepository->getOrderSum($request);
    return $sum_count;
  }

  public function deleteAllItemSum($request)
  {
    $sum_count = $this->sum_countRepository->deleteAllItemSum($request);
    return $sum_count;
  }

}

?>