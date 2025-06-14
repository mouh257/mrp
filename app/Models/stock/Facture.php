<?php

namespace App\Models\stock;

use App\Models\parametres\Fournisseur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facture extends Model
{
    use HasFactory;
    protected $fillable=['date','reference','fournisseur_id','montant'];

    public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(
            Fournisseur::class,
            'fournisseur_id');
    }

}
