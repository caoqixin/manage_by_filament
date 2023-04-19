<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PhoneModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_model', 'model_id', 'product_id');
    }
}
