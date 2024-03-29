<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmes extends Model {

    use HasFactory;
    protected $table = 'Programmes';         // Table liée au modèle
    protected $primaryKey = 'codeProgramme'; // Clé primaire
    protected $connexion = 'mysql';          // Connexion à utiliser
}