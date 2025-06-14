<?php

namespace App\Models\reception;

use App\Models\parametres\Culture;
use App\Models\parametres\Ferme;
use App\Models\parametres\Variete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prevision extends Model
{
    use HasFactory;
    protected $fillable=['ferme_id','culture_id','variete_id','dateprevision','pdsprevu',];

    public function ferme(): BelongsTo
    {
        return $this->belongsTo(
            Ferme::class,
            'ferme_id');
    }
    public function culture(): BelongsTo
    {
        return $this->belongsTo(
            Culture::class,
            'culture_id');
    }
    public function variete(): BelongsTo
    {
        return $this->belongsTo(
            Variete::class,
            'variete_id');
    }
}
