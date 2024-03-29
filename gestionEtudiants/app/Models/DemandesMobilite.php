<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandesMobilite extends Model {

    use HasFactory;
    protected $table = 'DemandesMobilite';         // Table liée au modèle
    protected $primaryKey = 'codeDemandeM';        // Clé primaire
    protected $connexion = 'mysql';                // Connexion à utiliser
}