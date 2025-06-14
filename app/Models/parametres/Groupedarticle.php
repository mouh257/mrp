<?php

namespace App\Models\parametres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupedarticle extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
