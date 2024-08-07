<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'productCode', 
        'laboratoryId',
        'presentationId',
        'typeId',
        'code',
        'product',
        'price',
        'stock',        
        'expiration',
    ];

    public function laboratorie(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class, 'laboratoryId');
    }

    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class,'presentationId');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'typeId');
    }

}
