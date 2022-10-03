<?php

namespace App\Service;

use App\Repository\PackageRepository;

class PackageService
{
    private $packageRepository;

    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }

    public function getPackagePrice($request){
        $package = $this->packageRepository->getPackagePrice($request);
        return $package;
    }

    public function countPackagePrice($request){
        $success = $this->packageRepository->countPackagePrice($request);
        if($success){
            return "T";
        }
        else{
            return "F";
        }
    }

    public function getPackageInfo($request){
        $package = $this->packageRepository->getPackageInfo($request);
        return $package;
    }

    public function deletePackage($request){
        $package = $this->packageRepository->deletePackage($request);
        return $package;
    }
}

?>