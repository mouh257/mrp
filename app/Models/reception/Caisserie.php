<?php

namespace App\Models\reception;

use App\Models\parametres\Ferme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Caisserie extends Model
{
    use HasFactory;
    protected $fillable=['ferme_id','nbs','nbrcaisse',];

    public function ferme(): BelongsTo
    {
        return $this->belongsTo(
            Ferme::class,
            'ferme_id');
    }
}
