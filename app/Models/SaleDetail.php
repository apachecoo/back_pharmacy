<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleDetail extends Model
{
    use HasFactory;

    protected $table='saleDetails';
    protected $fillable = [
        'id',
        'saleId',
        'productId',
        'quantity',
        'discount',
        'price',
        'total',
        'created_at',
        'updated_at',
    ];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class, 'saleId');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
