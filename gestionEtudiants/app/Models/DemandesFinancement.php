<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandesFinancement extends Model {

    use HasFactory;
    protected $table = 'Demandesfinancement';         // Table liée au modèle
    protected $primaryKey = 'codeDemandeF';           // Clé primaire
    protected $connexion = 'mysql';                   // Connexion à utiliser
}