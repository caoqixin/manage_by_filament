<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'ns',
        'thumbnail',
        'stock',
        'purchase_price',
        'retail_price',
        'category_id',
        'model_id',
        'supplier_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(PhoneModel::class, 'product_model', 'product_id', 'model_id');
    }

    public function cartItem(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
