<?php

namespace App\Repository;

use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberRepository
{
    public function memberLogin($request){
        $accountcheck = $request -> account;
        $passwordcheck = $request -> password;

        $password = DB::select("SELECT `password` From `member` WHERE `nickname` = '$accountcheck'");
        foreach($password as $pass)
        {
            $password =  $pass->password;
        }
        
        if($password == $passwordcheck){
            return(DB::select("SELECT * From `member` WHERE `nickname` = '$accountcheck'"));
        }
        else{
            return "帳號或密碼錯誤";
        }
        
    }

    public function getRecipeAuthor($request){
        return Member::where('mId', '=', $request -> id)->get();
    }

    public function getMemberName($request){
        return Member::where('mId', '=', $request -> id)->get();
    }

    public function addMember($request){
        $name = $request -> name;
        $gender = $request -> gender;
        $birth = $request -> birth;
        $phone = $request -> phone;
        $nickname = $request -> nickname;
        $mail = $request -> mail;
        $password = $request -> password;

        $exist = DB::select("SELECT * From `member` WHERE `nickname` = '$nickname'");

        if($exist == null){
            $bool = Member::create(
                ["mName" => $name,
                "gender" => $gender,
                "birth" => $birth,
                "phone" => $phone,
                "nickname" => $nickname,
                "mail" => $mail,
                "password" => $password]
            );
            return $bool;
        }        
    }
    // 顯示會員資料
    public function getAllMembers($request)
    {   
      return DB::select("SELECT * From `Member` WHERE `mId` = $request->mId"); 
    }
    // 修改會員密碼
    public function updatePassword($request)
    {   
      $res=Member::where('mId','=',$request->mId)->update(
        [
          'mId'=>$request->mId,
          'password'=>$request->password    
        ]   
      );
      return $res;
    }

    //修改會員資料
    public function updateMember($request){
        $res=Member::where('mId','=',$request->mId)->update(
        [
            'mId'=>$request->mId, 
            'mName'=>$request->mName, 
            'gender'=>$request->gender, 
            'birth'=>$request->birth,
            'phone'=>$request->phone,
            'nickname'=>$request->nickname, 
            'mail'=>$request->mail,
            'password'=>$request->password
        ]
        );
        return $res;
    }
}
?>