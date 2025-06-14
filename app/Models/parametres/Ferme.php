<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ferme extends Model
{
    use HasFactory;

    protected $fillable=['name','producteur_id','adresse'];



    public function producteur(): BelongsTo
    {
        return $this->belongsTo(
            Producteur::class,
            'producteur_id');
    }


    public function serres(): HasMany
    {
        return $this->hasMany(Serre::class);
    }
}
