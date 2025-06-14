<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producteur extends Model
{
    use HasFactory;

    protected $fillable=['name','ref','ggn'];

    public function fermes(): HasMany
    {
        return $this->hasMany(Ferme::class);
    }

}
