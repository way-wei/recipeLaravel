<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

use App\Models\Category;

class CategoryRepository
{
    public function getCategoryId($request)
    {
        return Category::where('cName', '=', $request -> category)->get();
    }

}
?>