<?php

namespace App\Repository;

use App\Models\Package;

class PackageRepository
{
    
    public function getPackagePrice($request){
        return Package::where('rId', '=', $request -> id)->get();
    }

    public function countPackagePrice($request){

        $originalPrice = $request -> price;
        $rId = $request -> rId;
        $cId = $request -> cId;

        if($cId == 1){
           $asobi = ceil($originalPrice * 1.3);
           $cost = $asobi + 80;
           $profit = ceil($cost * 1.5);
           $packagePrice = ceil($profit / 0.95);
        }
        elseif($cId == 2){
            $asobi = ceil($originalPrice * 1.5);
            $cost = $asobi + 150;
            $profit = ceil($cost * 1.5);
            $packagePrice = ceil($profit / 0.95);
         }
         elseif($cId == 3){
            $asobi = ceil($originalPrice * 1.5);
            $cost = $asobi + 230;
            $profit = ceil($cost * 1.5);
            $packagePrice = ceil($profit / 0.95);
         }
         elseif($cId == 4){
            $asobi = ceil($originalPrice * 1.3);
            $cost = $asobi + 80;
            $profit = ceil($cost * 1.5);
            $packagePrice = ceil($profit / 0.95);
         }

        $bool = Package::create(
            ["price" => $packagePrice,
            "rId" => $rId,
            ]
        );
        return $bool;
    }

    public function getPackageInfo($request){
        return Package::where('pId', '=', $request -> pId)->get();
    }

    public function deletePackage($request){
        $res=Package::where('rId','=',$request->rId)->delete();
        return $res;
      }
}
?>