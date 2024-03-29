<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrats extends Model {

    use HasFactory;
    protected $table = 'Contrats';         // Table liée au modèle
    protected $primaryKey = 'codeContrats';// Clé primaire
    protected $connexion = 'mysql';        // Connexion à utiliser

}
