<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'portal',
        'username',
        'password',
    ];

    public function cards():HasMany
    {
        return $this->hasMany(SimCard::class);
    }
}
