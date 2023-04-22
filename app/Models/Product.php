<?php

namespace App\Models;

use App\Exceptions\InternalException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

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

    /*
     * 减少库存
     */
    public function descreseStock($amount)
    {
        if ($amount < 0) {
            throw new InternalException('减库存不可小于0');
        }

        return $this->where('id', $this->id)->where('stock', '>=', $amount)->decrement('stock', $amount);
    }

    public function addStock($amount)
    {
        if ($amount < 0) {
            throw new InternalException('加库存不可小于0');
        }
        $this->increment('stock', $amount);
    }

}
