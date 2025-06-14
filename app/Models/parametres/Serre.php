<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serre extends Model
{
    use HasFactory;
    protected $fillable=['name','superficie','ferme_id','culture_id','variete_id'];

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
