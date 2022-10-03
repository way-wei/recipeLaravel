<?php

namespace App\Service;

use App\Repository\MemberRepository;

class MemberService
{
    private $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function memberLogin($request){
        $member = $this->memberRepository->memberLogin($request);
        return $member;
    }

    public function getRecipeAuthor($request){
        $member = $this->memberRepository->getRecipeAuthor($request);
        return $member;
    }

    public function getMemberName($request){
        $member = $this->memberRepository->getMemberName($request);
        return $member;
    }

    public function addMember($request){
        $success = $this->memberRepository->addMember($request);
        if($success){
            return "T";
        }
        else{
            return "F";
        }
    }
     // 顯示會員資料
    public function getAllMembers($request)
    {
        $member = $this->memberRepository->getAllMembers($request);
        return $member;
    }
    // 修改會員密碼
    public function updatePassword($request)
    {
        $member = $this->memberRepository->updatePassword($request);
        return $member;
    }

    //修改成員
    public function updateMember($request){
      $isSuccess=$this->memberRepository->updateMember($request);
      if($isSuccess){
          return '修改成功';
      }
      else{
          return '修改失敗';
      }
  }
}

?>