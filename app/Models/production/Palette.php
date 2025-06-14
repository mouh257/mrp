<?php

namespace App\Models\production;

use App\Models\parametres\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Palette extends Model
{
    use HasFactory;
    protected $fillable=['numpal','numcmd','cornier','feuillard','depart_id','typpal_id'];

    public function depart(): BelongsTo
    {
        return $this->belongsTo(
            Depart::class,
            'depart_id');
    }

    public function typePalette(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'typpal_id');
    }

    public function colisage(): HasMany
    {
        return $this->hasMany(Colisage::class);
    }
}
