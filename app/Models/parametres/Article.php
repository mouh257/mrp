<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable=['name','group_id','stockmin','nbrppal','unite'];

    public function groupe(): BelongsTo
    {
        return $this->belongsTo(
            Groupedarticle::class,
            'group_id');
    }

    public function produitsfinis(): HasMany
    {
        return $this->hasMany(Produitfini::class);
    }
}
