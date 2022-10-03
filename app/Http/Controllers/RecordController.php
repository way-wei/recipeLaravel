<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\RecordService;

class RecordController extends Controller
{
    private $recordService;

    // 建構子
    public function __construct(RecordService $recordService)
    {
        $this->recordService = $recordService;
    }


    public function addRecord(Request $request)
    {
        return $this->recordService->addRecord(Json_decode($request -> getContent()));
    }

    public function getAllRecord(Request $request)
    {
        return $this->recordService->getAllRecord(Json_decode($request -> getContent()));
    }

}

?>