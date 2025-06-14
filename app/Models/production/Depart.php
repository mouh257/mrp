<?php

namespace App\Models\production;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Depart extends Model
{
    use HasFactory;
    protected $fillable=['numexp','tracteur','remorque','datedepart','locked'];

    public function palettes(): HasMany
    {
        return $this->hasMany(Palette::class);
    }
}
