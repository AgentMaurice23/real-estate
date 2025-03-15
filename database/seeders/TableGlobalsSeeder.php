<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableGlobalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate la table avant d'ajouter des données pour éviter les doublons lors des exécutions ultérieures
        //DB::table('table_globals')->truncate();
        DB::table('table_globals')->delete();

        // Insérer les données
        $data = [

            ['data_type' => 'user', 'data_cat' => 'Etudiant', 'cat_name' => 'User_etudiant', 'cat_desc' => 'Représente un étudiant utilisateur de la plateforme'],
            ['data_type' => 'user', 'data_cat' => 'Autres', 'cat_name' => 'User_autres', 'cat_desc' => 'Représente un directeur utilisateur de la plateforme'],
            ['data_type' => 'user', 'data_cat' => 'Professeur', 'cat_name' => 'User_professeur', 'cat_desc' => 'Représente un enseignant editeur de la plateforme'],
            ['data_type' => 'user', 'data_cat' => 'Enseignant', 'cat_name' => 'User_enseignant', 'cat_desc' => 'Représente un chef service utilisateur de la plateforme'],
            ['data_type' => 'user', 'data_cat' => 'Particulier', 'cat_name' => 'User_particulier', 'cat_desc' => 'Représente un ou une secretaire utilisateur de la plateforme'],

            ['data_type' => 'statut', 'data_cat' => 'En attente', 'cat_name' => 'statut_en_attente', 'cat_desc' => 'Représente le statut En attente de la plateforme'],
            ['data_type' => 'statut', 'data_cat' => 'Vendu', 'cat_name' => 'statut_vendu', 'cat_desc' => 'Représente le statut département GC de la plateforme'],
            ['data_type' => 'statut', 'data_cat' => 'Loué', 'cat_name' => 'statut_loue', 'cat_desc' => 'Représente le statut département de GE la plateforme'],
            ['data_type' => 'statut', 'data_cat' => 'Vendre', 'cat_name' => 'statut_vendre', 'cat_desc' => 'Représente le statut département GMP de la plateforme'],
            ['data_type' => 'statut', 'data_cat' => 'Louer', 'cat_name' => 'statut_louer', 'cat_desc' => 'Représente le statut département de GE la plateforme'],

            ['data_type' => 'news', 'data_cat' => 'Rooms', 'cat_name' => 'News rooms', 'cat_desc' => 'Représente une actualité à propos aux chambres '],
            ['data_type' => 'News', 'data_cat' => 'Property', 'cat_name' => 'News Property', 'cat_desc' => 'Représente une actualité à propos d’une maison'],
            ['data_type' => 'News', 'data_cat' => 'Land', 'cat_name' => 'News Land', 'cat_desc' => 'Représente une actualité à propos des terrain'],

        ];


        DB::table('table_globals')->insert($data);
    }
}
