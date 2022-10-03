<?php

namespace App\Service;

use App\Repository\TransactionRepository;

class TransactionService
{
  private $transactionRepository;

  public function __construct(TransactionRepository $transactionRepository)
  {
    $this->transactionRepository = $transactionRepository;
  }

  public function getMaxId()
  {
    $transaction = $this->transactionRepository->getMaxId();
    return $transaction;
  }

  public function addTransaction($request)
  {
    $success = $this->transactionRepository->addTransaction($request);
    if($success){
      return "T";
    }
    else{
        return "F";
    }
  }

  public function getAllTransaction($request)
  {
    $success = $this->transactionRepository->getAllTransaction($request);
    return $success;
  }

  public function getOneTransaction($request)
  {
    $success = $this->transactionRepository->getOneTransaction($request);
    return $success;
  }
}

?>