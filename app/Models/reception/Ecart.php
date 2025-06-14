<?php

namespace App\Models\reception;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ecart extends Model
{
    use HasFactory;
    protected $fillable=['reception_id','pdsecart',];

    public function reception(): BelongsTo
    {
        return $this->belongsTo(
            Reception::class,
            'reception_id');
    }
}
