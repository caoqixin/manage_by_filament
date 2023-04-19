<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SimCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'iccid',
        'telephone',
        'operator_id',
        'status'
    ];

    public function operator():BelongsTo
    {
        return $this->belongsTo(Operator::class);
    }
}
