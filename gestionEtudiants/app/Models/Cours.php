<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model {

    use HasFactory;
    protected $table = 'Cours';            // Table liée au modèle
    protected $primaryKey = 'codeCours';   // Clé primaire
    protected $connexion = 'mysql';        // Connexion à utiliser
}