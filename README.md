# Site DISMAT — Laravel 11 + PostgreSQL + Filament

Site vitrine et back-office pour **DISMAT**, distributeur de matériel bureautique et informatique basé à Dakar (Sénégal).

## Ce que contient le projet

- **Site public** (Blade + Tailwind CSS) : Accueil, À propos, Services, Catalogue produits (avec filtre par catégorie et recherche), Fiche produit, Actualités, Contact (formulaire fonctionnel), Mentions légales.
- **Back-office administrateur** ([Filament 3](https://filamentphp.com)) sur `/admin` pour gérer sans coder : catégories, produits (avec upload de photo), services, actualités, et consultation des messages reçus depuis le formulaire de contact.
- **Base de données PostgreSQL**.

## Prérequis

- PHP >= 8.2 avec les extensions `pdo_pgsql`, `mbstring`, `gd` (pour l'upload/retouche d'images)
- Composer 2
- Node.js 18+ et npm
- PostgreSQL 13+

## Installation

```bash
# 1. Installer les dépendances PHP et JS
composer install
npm install

# 2. Copier le fichier d'environnement et générer la clé d'application
cp .env.example .env
php artisan key:generate

# 3. Créer la base de données PostgreSQL (adapter si besoin)
createdb dismat
# ou depuis psql :  CREATE DATABASE dismat;

# 4. Vérifier/adapter les identifiants de connexion dans .env
#    DB_CONNECTION=pgsql
#    DB_HOST=127.0.0.1
#    DB_PORT=5432
#    DB_DATABASE=dismat
#    DB_USERNAME=postgres
#    DB_PASSWORD=postgres

# 5. Lancer les migrations et charger le contenu de démonstration
php artisan migrate --seed

# 6. Créer le lien symbolique de stockage public (photos produits/actualités)
php artisan storage:link

# 7. Compiler les assets (CSS/JS)
npm run build
# ou, en développement, dans un terminal séparé :
npm run dev

# 8. Lancer le serveur
php artisan serve
```

Le site est ensuite accessible sur **http://localhost:8000**.

## Accès au back-office

URL : **http://localhost:8000/admin**

Identifiants créés par le seeder de démonstration :

- Email : `admin@dismatsn.com`
- Mot de passe : `dismat2026`

**Important : changez ce mot de passe (ou créez un nouvel utilisateur et supprimez celui-ci) avant toute mise en production.**

Pour créer un autre administrateur en ligne de commande :

```bash
php artisan tinker
>>> \App\Models\User::create(['name' => 'Votre nom', 'email' => 'vous@dismatsn.com', 'password' => bcrypt('un-mot-de-passe-fort')]);
```

## Contenu de démonstration

Le seeder (`database/seeders/`) crée :

- 6 catégories de produits (Informatique, Bureautique, Mobilier de bureau, Consommables, Réseaux & sécurité, Onduleurs & énergie)
- 22 produits d'exemple avec prix, descriptions et références
- 6 services
- 4 articles d'actualité

Ce contenu est fictif et sert de point de départ : remplacez-le par vos vrais produits, textes et photos depuis le back-office (`/admin`), ou modifiez directement les fichiers `database/seeders/*.php` puis relancez `php artisan migrate:fresh --seed` (⚠️ cette dernière commande efface toutes les données existantes).

## Informations de l'entreprise

Les coordonnées affichées dans le pied de page, la page Contact et les mentions légales (adresse, téléphone, email, RC, NINEA, coordonnées bancaires) sont centralisées dans **`config/dismat.php`** — modifiez ce fichier pour les mettre à jour partout en une seule fois.

## Formulaire de contact

Les messages envoyés depuis `/contact` sont enregistrés en base (table `contact_messages`) et consultables dans le back-office sous **Contenu > Messages de contact**. Le formulaire inclut un champ anti-spam (honeypot) invisible pour les utilisateurs humains.

Pour recevoir une notification par email à chaque nouveau message, il est possible d'ajouter un `Mail::to(...)` dans `App\Http\Controllers\ContactController::store()` une fois un service d'envoi d'email configuré dans `.env` (`MAIL_MAILER`, etc.).

## Déploiement en production

Avant la mise en ligne :

1. `APP_ENV=production` et `APP_DEBUG=false` dans `.env`.
2. Générer une nouvelle `APP_KEY` dédiée à la production si ce n'est pas déjà fait.
3. `composer install --optimize-autoloader --no-dev`
4. `npm run build`
5. `php artisan migrate --force` (sans `--seed`, sauf si vous voulez conserver les données de démo)
6. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
7. Configurer un vrai fournisseur d'email (`MAIL_MAILER`) si vous activez les notifications par email.
8. Changer le mot de passe administrateur par défaut.
9. Pointer le serveur web (Nginx/Apache) vers le dossier `public/`.

## Structure du projet

```
app/
  Filament/Resources/   → back-office (CRUD catégories, produits, services, articles, messages)
  Http/Controllers/     → contrôleurs du site public
  Models/                → Category, Product, Service, Article, ContactMessage, User
config/dismat.php        → coordonnées et informations légales de l'entreprise
database/migrations/     → schéma PostgreSQL
database/seeders/        → contenu de démonstration
resources/views/         → vues Blade du site public (Tailwind CSS)
routes/web.php           → routes du site public
```

## Note technique

Ce projet a été généré sans exécution de `composer install` / `npm install` dans l'environnement de génération (accès réseau à Packagist non disponible dans ce contexte). Le code a été relu et le schéma de base de données validé directement contre un PostgreSQL réel. Suivez simplement les étapes d'installation ci-dessus dans votre propre environnement.
