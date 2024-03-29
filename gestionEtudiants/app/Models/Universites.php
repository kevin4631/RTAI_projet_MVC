<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universites extends Model
{
    protected $table = 'Universites';         //Table liée au modèle
    protected $primaryKey = 'codeU';  //Clé primaire
    protected $connexion = 'mysql';        //Connexion à utiliser

    public $timestamps = false; //Désactive l'ajout des timestamps dans la base de données
}