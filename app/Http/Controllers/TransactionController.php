<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TransactionService;

class TransactionController extends Controller
{
    private $transactionService;

    // 建構子
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function getMaxId()
    {
        return $this->transactionService->getMaxId();
    }

    public function addTransaction(Request $request)
    {
        return $this->transactionService->addTransaction(Json_decode($request -> getContent()));
    }

    public function getAllTransaction(Request $request)
    {
        return $this->transactionService->getAllTransaction(Json_decode($request -> getContent()));
    }

    public function getOneTransaction(Request $request)
    {
        return $this->transactionService->getOneTransaction(Json_decode($request -> getContent()));
    }
}

?>