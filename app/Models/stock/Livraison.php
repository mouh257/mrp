<?php

namespace App\Models\stock;

use App\Models\parametres\Article;
use App\Models\parametres\Fournisseur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livraison extends Model
{
    use HasFactory;
    protected $fillable=['date','nbl','fournisseur_id','article_id','quantite','commande_id','facture_id'];

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
    public function commande(): BelongsTo
    {
        return $this->belongsTo(
            Approvisionnement::class,
            'commande_id');
    }
    public function facture(): BelongsTo
    {
        return $this->belongsTo(
            Facture::class,
            'facture_id');
    }

}
