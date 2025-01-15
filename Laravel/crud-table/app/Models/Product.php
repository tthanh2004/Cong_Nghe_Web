<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'description',
        'price',
    ];

    /**
     * Lấy cửa hàng mà sản phẩm thuộc về.
     */
    // quan hệ 1 - n : store - n là products
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
