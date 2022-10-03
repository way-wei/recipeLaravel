<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\sum_countService;

class sum_countController extends Controller
{
    private $sum_countService;

    // 建構子
    public function __construct(sum_countService $sum_countService)
    {
        $this->sum_countService = $sum_countService;
    }


    public function addItemSum(Request $request)
    {
        return $this->sum_countService->addItemSum(Json_decode($request -> getContent()));
    }

    public function deleteItemSum(Request $request)
    {
        return $this->sum_countService->deleteItemSum(Json_decode($request -> getContent()));
    }

    public function getOrderSum(Request $request)
    {
        return $this->sum_countService->getOrderSum(Json_decode($request -> getContent()));
    }

    public function deleteAllItemSum(Request $request)
    {
        return $this->sum_countService->deleteAllItemSum(Json_decode($request -> getContent()));
    }

}

?>