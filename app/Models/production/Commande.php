<?php

namespace App\Models\production;

use App\Models\parametres\Produitfini;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;

    protected $fillable=['numcmd','client','datefab','produitfini_id','nbrcolis','pdstotal','nbrpal','observation','annulee'];

    public function produitfini(): BelongsTo
    {
        return $this->belongsTo(
            Produitfini::class,
            'produitfini_id');
    }


}
