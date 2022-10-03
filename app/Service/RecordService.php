<?php

namespace App\Service;

use App\Repository\RecordRepository;

class RecordService
{
  private $cartRepository;

  public function __construct(RecordRepository $recordRepository)
  {
    $this->recordRepository = $recordRepository;
  }

  public function addRecord($request)
  {
    $record = $this->recordRepository->addRecord($request);
    return $record;
  }

  public function getAllRecord($request)
  {
    $record = $this->recordRepository->getAllRecord($request);
    return $record;
  }

}

?>