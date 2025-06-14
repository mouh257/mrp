<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Culture extends Model
{
    use HasFactory;

    protected $fillable=['name','verstart','versend'];


    public function varietes(): HasMany
    {
        return $this->hasMany(Variete::class);
    }

    public function calibres(): HasMany
    {
        return $this->hasMany(Calibre::class);
    }

    public function colorations(): HasMany
    {
        return $this->hasMany(Coloration::class);
    }

    public function produitsfinis(): HasMany
    {
        return $this->hasMany(Produitfini::class);
    }
}
