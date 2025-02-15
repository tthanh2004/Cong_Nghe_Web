<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    /**
     * Lấy tất cả các sản phẩm của cửa hàng.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
