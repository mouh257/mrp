<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produitfini extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'name','culture_id','colis_id','pdscolis','brqtt_id'
        ,'nbrbrqtt','pdsbrqtt','couv_id','stab_id','divstab'
        ,'etiq_id','nbretiq','etiq2_id','nbretiq2',];


    public function culture(): BelongsTo
    {
        return $this->belongsTo(
            Culture::class,
            'culture_id');
    }

    public function colis(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'colis_id');
    }

    public function barquette(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'brqtt_id');
    }

    public function couvercle(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'couv_id');
    }

    public function stabilisateur(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'stab_id');
    }

    public function etiquette(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'etiq_id');
    }

    public function etiquette2(): BelongsTo
    {
        return $this->belongsTo(
            Article::class,
            'etiq2_id');
    }
}
