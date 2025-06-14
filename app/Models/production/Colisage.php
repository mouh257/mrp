<?php

namespace App\Models\production;

use App\Models\parametres\Calibre;
use App\Models\parametres\Coloration;
use App\Models\parametres\Produitfini;
use App\Models\parametres\Variete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Colisage extends Model
{
    use HasFactory;

    protected $fillable=['palette_id','produitfini_id','nbrcolis','versement','calibre_id','variete_id','coloration_id','pdstotal','observation'];

    public function palette(): BelongsTo
    {
        return $this->belongsTo(
            Palette::class,
            'palette_id');
    }

    public function produitfini(): BelongsTo
    {
        return $this->belongsTo(
            Produitfini::class,
            'produitfini_id');
    }

    public function calibre(): BelongsTo
    {
        return $this->belongsTo(
            Calibre::class,
            'calibre_id');
    }

    public function variete(): BelongsTo
    {
        return $this->belongsTo(
            Variete::class,
            'variete_id');
    }

    public function coloration(): BelongsTo
    {
        return $this->belongsTo(
            Coloration::class,
            'coloration_id');
    }

}
