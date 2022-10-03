<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CollectService;

class CollectController extends Controller
{
    private $collectService;

    // 建構子
    public function __construct(CollectService $collectService)
    {
        $this->collectService = $collectService;
    }

    // 查詢所有成員
    public function addCollect(Request $request)
    {
        return $this->collectService->addCollect(Json_decode($request -> getContent()));
    }
    //顯示會員收藏
    public function getAllCollects(Request $request)
    {
        return $this->collectService->getAllCollects(Json_decode($request->getContent()));
    }
    //顯示會員指定收藏
    public function getACollect(Request $request)
    {
        return $this->collectService->getACollect(Json_decode($request->getContent()));
    }
    //刪除收藏
    public function deleteCollect(Request $request)
    {
        return $this->collectService->deleteCollect(Json_decode($request->getContent()));    
    }

}

?>