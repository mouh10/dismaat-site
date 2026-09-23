<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'DISMAT renforce son stock de matériel informatique pour la rentrée',
                'excerpt' => 'À l\'approche de la rentrée, DISMAT élargit son catalogue d\'ordinateurs et d\'imprimantes pour accompagner entreprises et administrations.',
                'content' => "À l'approche de la rentrée, DISMAT a renforcé ses stocks d'ordinateurs portables, d'imprimantes et de fournitures de bureau afin de répondre à la demande croissante des entreprises et administrations sénégalaises.\n\nNos équipes commerciales se tiennent à votre disposition pour établir des devis rapides, y compris pour les commandes en volume. N'hésitez pas à nous contacter pour anticiper vos besoins d'équipement.",
                'author' => 'DISMAT',
                'days_ago' => 3,
            ],
            [
                'title' => '5 conseils pour bien entretenir votre parc informatique',
                'excerpt' => 'Quelques bonnes pratiques simples pour prolonger la durée de vie de vos équipements bureautiques.',
                'content' => "Un parc informatique bien entretenu, c'est moins de pannes et moins de coûts imprévus. Voici quelques conseils simples :\n\n1. Dépoussiérez régulièrement les unités centrales et imprimantes.\n2. Évitez les surtensions grâce à un onduleur.\n3. Mettez à jour vos systèmes régulièrement.\n4. Planifiez une maintenance préventive annuelle.\n5. Formez vos équipes aux bons usages du matériel.\n\nDISMAT propose des contrats de maintenance adaptés à la taille de votre parc : contactez-nous pour en savoir plus.",
                'author' => 'Équipe technique DISMAT',
                'days_ago' => 12,
            ],
            [
                'title' => 'Nouveau partenariat avec des marques leaders du secteur',
                'excerpt' => 'DISMAT élargit son offre grâce à de nouveaux partenariats avec des fabricants reconnus de matériel bureautique.',
                'content' => "Afin de proposer un choix toujours plus large à ses clients, DISMAT a noué de nouveaux partenariats avec plusieurs fabricants reconnus de matériel informatique et bureautique.\n\nCes accords nous permettent de vous garantir des délais d'approvisionnement plus courts et des tarifs compétitifs sur l'ensemble de notre catalogue.",
                'author' => 'DISMAT',
                'days_ago' => 25,
            ],
            [
                'title' => 'Comment bien choisir le mobilier de votre nouvel espace de bureau',
                'excerpt' => 'Ergonomie, budget, gain de place : nos conseils pour équiper efficacement vos locaux professionnels.',
                'content' => "L'aménagement d'un espace de bureau ne s'improvise pas. Entre ergonomie, optimisation de l'espace et budget, plusieurs critères doivent être pris en compte avant de choisir votre mobilier.\n\nNotre équipe accompagne les entreprises sénégalaises dans la conception de leurs espaces de travail, du choix du mobilier à l'installation complète. Contactez-nous pour un accompagnement personnalisé.",
                'author' => 'DISMAT',
                'days_ago' => 40,
            ],
        ];

        foreach ($articles as $article) {
            Article::firstOrCreate(
                ['title' => $article['title']],
                [
                    'excerpt' => $article['excerpt'],
                    'content' => $article['content'],
                    'author' => $article['author'],
                    'is_published' => true,
                    'published_at' => now()->subDays($article['days_ago']),
                ]
            );
        }
    }
}
