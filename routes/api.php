<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\sum_countController;
use App\Http\Controllers\RecordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/member')->group(function(){
    Route::post('/memberlogin', [MemberController::class, 'memberLogin']);
    Route::post('/getAllMembers',[MemberController::class,'getAllMembers']);    
    Route::post('/updatePassword', [MemberController::class, 'updatePassword']);
    Route::post('/insertMember',[MemberController::class,'insertMember']);
    Route::post('/updateMember',[MemberController::class,'updateMember']);
    Route::post('/deleteMember',[MemberController::class,'deleteMember']);
    Route::post('/checkMember',[MemberController::class,'checkMember']);
    Route::post('/membername', [MemberController::class, 'getMemberName']);
    Route::post('/addmember', [MemberController::class, 'addMember']); 
    Route::post('/recipeauthor', [MemberController::class, 'getRecipeAuthor']);  
});

Route::get('/recipes', [RecipeController::class, 'getAllRecipes']);
Route::get('/getrId',[RecipeController::class,'getrId']);
Route::prefix('/recipe')->group(function(){
    Route::post('/getMemberRecipes', [RecipeController::class, 'getMemberRecipes']);
    Route::post('/getMemberARecipe', [RecipeController::class, 'getMemberARecipe']);    
    Route::post('/insertRecipe',[RecipeController::class,'insertRecipe']);
    Route::post('/updateRecipe',[RecipeController::class,'updateRecipe']);
    Route::post('/deleteRecipe',[RecipeController::class,'deleteRecipe']);
    Route::post('/chooseImg',[RecipeController::class,'chooseImg']);
    Route::post('/postFile',[RecipeController::class,'postFile']);
    Route::post('/recipeinfo', [RecipeController::class, 'getRecipeInfo']);
    Route::post('/searchrecipes', [RecipeController::class, 'searchRecipe']);
    
});
Route::prefix('/ingredient')->group(function(){
    Route::post('/getAllIngredients', [IngredientsController::class, 'getAllIngredients']);
    Route::post('/updateIngredient', [IngredientsController::class, 'updateIngredient']);
    Route::post('/insertIngredient',[IngredientsController::class,'insertIngredient']);
    Route::post('/deleteIngredient',[IngredientsController::class,'deleteIngredient']);
    Route::post('/recipeingre', [IngredientsController::class, 'getItemIngre']);
});

Route::prefix('/category')->group(function(){
    Route::post('/id', [CategoryController::class, 'getCategoryId']);
});

Route::prefix('/package')->group(function(){
    Route::post('/recipeprice', [PackageController::class, 'getPackagePrice']);
    Route::post('/countprice', [PackageController::class, 'countPackagePrice']);
    Route::post('/getpackageinfo', [PackageController::class, 'getPackageInfo']);
    Route::post('/deletepackage', [PackageController::class, 'deletePackage']);
});



Route::prefix('/step')->group(function(){
    Route::post('/recipestep', [StepController::class, 'getItemStep']);
    Route::post('/getAllStep', [StepController::class, 'getAllStep']);
    Route::post('/insertStep', [StepController::class, 'insertStep']);
    Route::post('/updateStep', [StepController::class, 'updateStep']);
    Route::post('/deleteStep', [StepController::class, 'deleteStep']);
});

Route::prefix('/collect')->group(function(){
    Route::post('/getAllCollects',[CollectController::class,'getAllCollects']);
    Route::post('/getACollect',[CollectController::class,'getACollect']);
    Route::post('/deleteCollect',[CollectController::class,'deleteCollect']);
    Route::post('/addcollect', [CollectController::class, 'addCollect']);
});

Route::prefix('/cart')->group(function(){
    Route::post('/getCartId', [CartController::class, 'getCartId']);
    Route::post('/addCart', [CartController::class, 'addCart']);
});

Route::prefix('/orders')->group(function(){
    Route::post('/getOrdersItem', [OrdersController::class, 'getOrdersItem']);
    Route::post('/deleteOrdersItem', [OrdersController::class, 'deleteOrdersItem']);
    Route::post('/updateOrdersItemF', [OrdersController::class, 'updateOrdersItemF']);
    Route::post('/updateOrdersItemT', [OrdersController::class, 'updateOrdersItemT']);
    Route::post('/addorder', [OrdersController::class, 'addOrder']);
    Route::post('/updateOrderPlus', [OrdersController::class, 'updateOrderPlus']);
    Route::post('/updateOrderMinus', [OrdersController::class, 'updateOrderMinus']);
    Route::post('/getCheckedOrder', [OrdersController::class, 'getCheckedOrder']);
    Route::post('/deleteorder', [OrdersController::class, 'deleteOrder']);
});

Route::prefix('/transaction')->group(function(){
    Route::get('/getMaxId', [TransactionController::class, 'getMaxId']);
    Route::post('/addTransaction', [TransactionController::class, 'addTransaction']);
    Route::post('/getAllTransaction', [TransactionController::class, 'getAllTransaction']);
    Route::post('/getOneTransaction', [TransactionController::class, 'getOneTransaction']);
});

Route::prefix('/sumcount')->group(function(){
    Route::post('/addItemSum', [sum_countController::class, 'addItemSum']);
    Route::post('/deleteItemSum', [sum_countController::class, 'deleteItemSum']);
    Route::post('/getOrderSum', [sum_countController::class, 'getOrderSum']);
    Route::get('/deleteAllItemSum', [sum_countController::class, 'deleteAllItemSum']);
});

Route::prefix('/record')->group(function(){
    Route::post('/addRecord', [RecordController::class, 'addRecord']);
    Route::post('/getAllRecord', [RecordController::class, 'getAllRecord']);
});