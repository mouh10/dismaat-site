<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Informatique', 'icon' => 'computer-desktop', 'order' => 1, 'description' => 'Ordinateurs, portables, écrans et périphériques informatiques.'],
            ['name' => 'Bureautique', 'icon' => 'printer', 'order' => 2, 'description' => 'Imprimantes, photocopieurs, scanners et solutions d\'impression.'],
            ['name' => 'Mobilier de bureau', 'icon' => 'archive-box', 'order' => 3, 'description' => 'Bureaux, chaises, armoires et aménagement d\'espaces de travail.'],
            ['name' => 'Consommables', 'icon' => 'archive-box', 'order' => 4, 'description' => 'Toners, cartouches, papeterie et fournitures de bureau.'],
            ['name' => 'Réseaux & sécurité', 'icon' => 'wifi', 'order' => 5, 'description' => 'Switchs, routeurs, câblage et vidéosurveillance.'],
            ['name' => 'Onduleurs & énergie', 'icon' => 'bolt', 'order' => 6, 'description' => 'Onduleurs et solutions de continuité électrique pour vos équipements.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
