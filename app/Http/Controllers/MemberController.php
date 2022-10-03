<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\MemberService;

class MemberController extends Controller
{
    private $memberService;

    // 建構子
    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function memberLogin(Request $request)
    {
        return $this->memberService->memberLogin(Json_decode($request -> getContent()));
    }

    public function getRecipeAuthor(Request $request)
    {
        return $this->memberService->getRecipeAuthor(Json_decode($request -> getContent()));
    }

    public function getMemberName(Request $request)
    {
        return $this->memberService->getMemberName(Json_decode($request -> getContent()));
    }

    public function addMember(Request $request)
    {
        return $this->memberService->addMember(Json_decode($request -> getContent()));
    }
    // 顯示會員資料
    public function getAllMembers(Request $request){
        return $this->memberService->getAllMembers(Json_decode($request->getContent()));
    }
    // 修改會員密碼
    public function updatePassword(Request $request){
        return $this->memberService->updatePassword(Json_decode($request->getContent()));
    }

    //修改成員
    public function updateMember(Request $request)
    {
        return $this->memberService->updateMember(Json_decode($request->getContent()));    
    }
}

?>