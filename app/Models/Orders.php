<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // 關閉timestamps（預設是開啟）
    public $timestamps = false;

    // 宣告可操作欄位 (沒宣告的欄位不能用哦)
    protected $fillable = [
      'cartId','pId','quantity','orderId','status'
    ];

}
?>