<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PackageService;

class PackageController extends Controller
{
    private $packageService;

    // 建構子
    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function getPackagePrice(Request $request)
    {
        return $this->packageService->getPackagePrice(Json_decode($request -> getContent()));
    }

    public function countPackagePrice(Request $request)
    {
        return $this->packageService->countPackagePrice(Json_decode($request -> getContent()));
    }

    public function getPackageInfo(Request $request)
    {
        return $this->packageService->getPackageInfo(Json_decode($request -> getContent()));
    }

    public function deletePackage(Request $request)
    {
        return $this->packageService->deletePackage(Json_decode($request -> getContent()));
    }
}

?>