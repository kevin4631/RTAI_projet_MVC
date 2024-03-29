<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomes extends Model {

    use HasFactory;
    protected $table = 'Diplomes';         // Table liée au modèle
    protected $primaryKey = 'codeContrat'; // Clé primaire
    protected $connexion = 'mysql';        // Connexion à utiliser
}