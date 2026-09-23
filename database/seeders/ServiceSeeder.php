<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Vente de matériel',
                'icon' => 'shopping-cart',
                'order' => 1,
                'short_description' => 'Un large choix de matériel bureautique et informatique, neuf et garanti.',
                'description' => "Nous sélectionnons pour vous des équipements fiables auprès de marques reconnues, adaptés à la taille et au budget de votre structure. Devis rapide et conseils personnalisés selon votre activité.",
            ],
            [
                'title' => 'Installation & configuration',
                'icon' => 'wrench-screwdriver',
                'order' => 2,
                'short_description' => 'Mise en service de vos équipements et de votre parc informatique.',
                'description' => "Nos techniciens installent et configurent vos postes, imprimantes et équipements réseau directement dans vos locaux, pour une prise en main immédiate par vos équipes.",
            ],
            [
                'title' => 'Maintenance & SAV',
                'icon' => 'cog-6-tooth',
                'order' => 3,
                'short_description' => 'Contrats de maintenance préventive et intervention rapide en cas de panne.',
                'description' => "DISMAT propose des contrats de maintenance adaptés à votre parc, avec des délais d'intervention garantis et un stock de pièces détachées pour limiter les interruptions d'activité.",
            ],
            [
                'title' => 'Fournitures & consommables',
                'icon' => 'archive-box',
                'order' => 4,
                'short_description' => 'Réapprovisionnement régulier en toners, papier et fournitures de bureau.',
                'description' => "Nous assurons un approvisionnement régulier de vos consommables, avec des formules d'abonnement pour ne jamais être en rupture de toner ou de papier.",
            ],
            [
                'title' => 'Aménagement de bureaux',
                'icon' => 'building-office',
                'order' => 5,
                'short_description' => 'Conception et équipement d\'espaces de travail clés en main.',
                'description' => "Du mobilier au câblage réseau, nous accompagnons l'aménagement complet de vos bureaux, sièges administratifs et espaces ouverts.",
            ],
            [
                'title' => 'Conseil & audit de parc',
                'icon' => 'clipboard-document-check',
                'order' => 6,
                'short_description' => 'Analyse de votre parc existant et recommandations de renouvellement.',
                'description' => "Nous réalisons un état des lieux de votre équipement actuel et vous proposons un plan de renouvellement adapté à votre budget et à vos priorités.",
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['title' => $service['title']], $service);
        }
    }
}
