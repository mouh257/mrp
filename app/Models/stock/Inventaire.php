<?php

namespace App\Models\stock;

use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventaire extends Model
{
    use HasFactory;
    protected $fillable=['date','fournisseur_id','article_id','quantite'];

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(
            Fournisseur::class,
            'fournisseur_id');
    }
    public function article(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'article_id');
    }
}
