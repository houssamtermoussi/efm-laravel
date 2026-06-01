<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['nom','prenom','age','classe_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
