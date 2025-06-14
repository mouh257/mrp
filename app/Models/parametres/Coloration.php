<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coloration extends Model
{
    use HasFactory;

    protected $fillable=['name','culture_id'];

    public function culture(): BelongsTo
    {
        return $this->belongsTo(
            Culture::class,
            'culture_id');
    }
}
