<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = ['nom', 'description', 'date_debut', 'date_fin', 'lieu', 'tarif', 'user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}