<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Informatique
            ['category' => 'Informatique', 'name' => 'Ordinateur portable HP ProBook 450 G10', 'brand' => 'HP', 'reference' => 'HP-PB450-G10', 'price' => 495000, 'featured' => true,
                'short' => 'Intel Core i5, 8 Go RAM, 512 Go SSD — idéal pour la bureautique professionnelle.',
                'desc' => "Portable professionnel 15,6\" conçu pour un usage bureautique intensif : processeur Intel Core i5 de dernière génération, 8 Go de RAM, SSD 512 Go, clavier renforcé et autonomie de toute une journée. Garantie constructeur 1 an."],
            ['category' => 'Informatique', 'name' => 'Ordinateur de bureau Dell OptiPlex', 'brand' => 'Dell', 'reference' => 'DELL-OPTI-3000', 'price' => 385000, 'featured' => false,
                'short' => 'Unité centrale compacte, Intel Core i5, 8 Go RAM, 256 Go SSD.',
                'desc' => "Poste de travail fiable et compact pour vos équipes administratives, livré avec Windows et une garantie constructeur."],
            ['category' => 'Informatique', 'name' => 'Écran LED 24" Full HD', 'brand' => 'Samsung', 'reference' => 'SAM-LED24-FHD', 'price' => 95000, 'featured' => false,
                'short' => 'Moniteur 24 pouces Full HD, idéal pour le double écran au bureau.',
                'desc' => "Écran 24 pouces Full HD avec dalle antireflet, parfait complément à votre poste de travail pour plus de confort visuel."],
            ['category' => 'Informatique', 'name' => 'Ordinateur portable Lenovo ThinkPad E15', 'brand' => 'Lenovo', 'reference' => 'LEN-TP-E15', 'price' => 520000, 'featured' => true,
                'short' => 'Intel Core i7, 16 Go RAM, 512 Go SSD — pour les usages exigeants.',
                'desc' => "Le ThinkPad E15 offre puissance et robustesse pour les cadres et responsables techniques : processeur Core i7, 16 Go de RAM et SSD rapide."],
            ['category' => 'Informatique', 'name' => 'Clavier et souris sans fil', 'brand' => 'Logitech', 'reference' => 'LOG-MK270', 'price' => 18500, 'featured' => false,
                'short' => 'Pack clavier + souris sans fil, confort et fiabilité au quotidien.',
                'desc' => "Ensemble clavier et souris sans fil, autonomie longue durée, idéal pour équiper rapidement un poste de travail."],

            // Bureautique
            ['category' => 'Bureautique', 'name' => 'Imprimante multifonction HP LaserJet Pro', 'brand' => 'HP', 'reference' => 'HP-LJ-M428', 'price' => 265000, 'featured' => true,
                'short' => 'Impression, scan et copie laser noir et blanc, réseau et wifi.',
                'desc' => "Multifonction laser rapide et économique, connectable en réseau et en wifi, adaptée aux volumes d'impression moyens à élevés d'un bureau."],
            ['category' => 'Bureautique', 'name' => 'Photocopieur Canon imageRUNNER', 'brand' => 'Canon', 'reference' => 'CAN-IR-2625', 'price' => 1250000, 'featured' => false,
                'short' => 'Photocopieur multifonction A3/A4 pour gros volumes.',
                'desc' => "Solution d'impression professionnelle pour les entreprises à fort volume, avec options de finition et de numérisation avancées."],
            ['category' => 'Bureautique', 'name' => 'Scanner de documents Epson', 'brand' => 'Epson', 'reference' => 'EPS-DS-320', 'price' => 145000, 'featured' => false,
                'short' => 'Scanner haute vitesse pour la numérisation de documents administratifs.',
                'desc' => "Numérisez rapidement vos archives et documents administratifs avec ce scanner compact et performant."],
            ['category' => 'Bureautique', 'name' => 'Imprimante jet d\'encre couleur Epson EcoTank', 'brand' => 'Epson', 'reference' => 'EPS-ET-2820', 'price' => 175000, 'featured' => false,
                'short' => 'Réservoirs d\'encre rechargeables, coût à la page très réduit.',
                'desc' => "Imprimante à réservoirs d'encre pour réduire durablement vos coûts d'impression couleur au bureau."],

            // Mobilier de bureau
            ['category' => 'Mobilier de bureau', 'name' => 'Bureau direction en bois', 'brand' => 'DISMAT Collection', 'reference' => 'MOB-BUR-DIR01', 'price' => 320000, 'featured' => true,
                'short' => 'Bureau de direction, finition bois, grand plateau de travail.',
                'desc' => "Bureau de direction élégant avec caissons de rangement, conçu pour les espaces de direction et les bureaux d'accueil."],
            ['category' => 'Mobilier de bureau', 'name' => 'Chaise de bureau ergonomique', 'brand' => 'DISMAT Collection', 'reference' => 'MOB-CHS-ERG01', 'price' => 85000, 'featured' => true,
                'short' => 'Chaise à roulettes, dossier réglable, soutien lombaire.',
                'desc' => "Chaise ergonomique réglable en hauteur, avec soutien lombaire renforcé pour un confort optimal en poste prolongé."],
            ['category' => 'Mobilier de bureau', 'name' => 'Armoire de rangement métallique', 'brand' => 'DISMAT Collection', 'reference' => 'MOB-ARM-MET01', 'price' => 145000, 'featured' => false,
                'short' => 'Armoire fermante à clé, 2 tablettes réglables.',
                'desc' => "Armoire métallique sécurisée, idéale pour le rangement de documents administratifs et de fournitures."],
            ['category' => 'Mobilier de bureau', 'name' => 'Table de réunion 8 places', 'brand' => 'DISMAT Collection', 'reference' => 'MOB-TAB-REU8', 'price' => 275000, 'featured' => false,
                'short' => 'Table modulable pour salle de réunion, finition mélaminé.',
                'desc' => "Grande table de réunion pouvant accueillir jusqu'à 8 personnes, idéale pour vos salles de conférence."],

            // Consommables
            ['category' => 'Consommables', 'name' => 'Toner HP 26A noir', 'brand' => 'HP', 'reference' => 'HP-26A-BLK', 'price' => 45000, 'featured' => false,
                'short' => 'Cartouche de toner d\'origine pour imprimantes HP LaserJet.',
                'desc' => "Toner noir d'origine, compatible avec la gamme HP LaserJet Pro M402/M426, pour une qualité d'impression constante."],
            ['category' => 'Consommables', 'name' => 'Ramette de papier A4 80g (500 feuilles)', 'brand' => 'Double A', 'reference' => 'DA-A4-80G', 'price' => 3500, 'featured' => false,
                'short' => 'Papier bureautique standard, blancheur premium.',
                'desc' => "Papier A4 de qualité premium, compatible avec toutes les imprimantes laser et jet d'encre."],
            ['category' => 'Consommables', 'name' => 'Pack cartouches jet d\'encre Epson', 'brand' => 'Epson', 'reference' => 'EPS-INK-PACK', 'price' => 28000, 'featured' => false,
                'short' => 'Pack de cartouches couleur et noir d\'origine Epson.',
                'desc' => "Pack complet de cartouches d'origine pour un rendu couleur fidèle et une longévité optimale de votre imprimante."],

            // Réseaux & sécurité
            ['category' => 'Réseaux & sécurité', 'name' => 'Switch réseau 24 ports', 'brand' => 'TP-Link', 'reference' => 'TPL-SW24-GB', 'price' => 95000, 'featured' => false,
                'short' => 'Switch Gigabit 24 ports pour réseaux d\'entreprise.',
                'desc' => "Switch administrable 24 ports Gigabit, adapté aux réseaux locaux d'entreprises de taille moyenne."],
            ['category' => 'Réseaux & sécurité', 'name' => 'Caméra de vidéosurveillance IP', 'brand' => 'Hikvision', 'reference' => 'HIK-IP-DOME', 'price' => 65000, 'featured' => false,
                'short' => 'Caméra dôme IP, vision nocturne, accès à distance.',
                'desc' => "Caméra de surveillance haute définition avec vision nocturne, pour sécuriser vos locaux et les superviser à distance."],
            ['category' => 'Réseaux & sécurité', 'name' => 'Routeur wifi professionnel', 'brand' => 'TP-Link', 'reference' => 'TPL-ROUT-PRO', 'price' => 58000, 'featured' => false,
                'short' => 'Routeur double bande pour connexion stable en entreprise.',
                'desc' => "Routeur wifi professionnel double bande, conçu pour offrir une connexion stable à un grand nombre d'utilisateurs simultanés."],

            // Onduleurs & énergie
            ['category' => 'Onduleurs & énergie', 'name' => 'Onduleur 1000VA', 'brand' => 'APC', 'reference' => 'APC-UPS-1000', 'price' => 78000, 'featured' => true,
                'short' => 'Protection contre les coupures pour poste de travail et serveur.',
                'desc' => "Onduleur fiable pour protéger vos équipements sensibles des coupures et variations électriques fréquentes."],
            ['category' => 'Onduleurs & énergie', 'name' => 'Onduleur 2000VA rackable', 'brand' => 'APC', 'reference' => 'APC-UPS-2000R', 'price' => 245000, 'featured' => false,
                'short' => 'Solution de continuité pour baies serveurs et salles techniques.',
                'desc' => "Onduleur rackable haute capacité, pensé pour la protection des infrastructures serveurs et réseau."],
        ];

        foreach ($products as $index => $item) {
            $category = Category::where('name', $item['category'])->first();

            Product::firstOrCreate(
                ['reference' => $item['reference']],
                [
                    'category_id' => $category?->id,
                    'name' => $item['name'],
                    'brand' => $item['brand'],
                    'short_description' => $item['short'],
                    'description' => $item['desc'],
                    'price' => $item['price'],
                    'is_featured' => $item['featured'],
                    'is_active' => true,
                    'order' => $index,
                ]
            );
        }
    }
}
