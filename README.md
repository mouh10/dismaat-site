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

# 7. Publier les assets CSS/JS du back-office Filament
#    (étape indispensable : sans elle, /admin s'affiche sans aucune mise en forme —
#    police par défaut du navigateur, icônes énormes et non stylées, mise en page cassée)
php artisan filament:assets

# 8. Compiler les assets du site public (CSS/JS)
npm run build
# ou, en développement, dans un terminal séparé :
npm run dev

# 9. Lancer le serveur
php artisan serve
```

Le site est ensuite accessible sur **http://localhost:8000**.

## Accès au back-office

URL : **http://localhost:8000/admin**

> **Le back-office s'affiche sans aucun style (police par défaut, icônes énormes, mise en page cassée) ?**
> C'est presque toujours parce que `php artisan filament:assets` n'a pas été exécuté (cette commande publie les fichiers CSS/JS compilés de Filament dans `public/css/filament` et `public/js/filament` — ce n'est **pas** la même chose que `npm run build`, qui ne compile que les assets du site public). Lancez-la, puis `php artisan optimize:clear` pour vider les caches, et rechargez la page.

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

Les messages envoyés depuis `/contact` sont enregistrés en base (table `contact_messages`) et consultables dans le back-office sous **Contenu > Messages de contact**. Le formulaire inclut :

- un champ anti-spam (honeypot) invisible pour les utilisateurs humains ;
- une limite de fréquence (5 envois par minute et par visiteur) pour empêcher le spam automatisé ;
- une **notification par email** envoyée automatiquement à chaque nouveau message, à l'adresse définie par `CONTACT_NOTIFY_EMAIL` dans `.env` (par défaut l'email de l'entreprise). L'email est envoyé via `App\Mail\ContactMessageReceived` et permet de répondre directement au visiteur (Reply-To pré-rempli). Si l'envoi échoue (fournisseur mal configuré, panne…), le message reste quand même enregistré en base — seul l'email échoue, jamais la soumission du formulaire.

Tant que `MAIL_MAILER=log` (valeur par défaut en local), les emails ne sont pas réellement envoyés : ils sont simplement écrits dans `storage/logs/laravel.log`. Configurez un vrai fournisseur (`MAIL_MAILER=smtp` + vos identifiants, ou un service comme Mailgun/Resend/Postmark) avant la mise en production pour que les notifications arrivent réellement par email.

## Fonctionnalités techniques incluses

- **`/sitemap.xml`** : plan du site généré dynamiquement (pages statiques + tous les produits actifs + tous les articles publiés), utile pour le référencement.
- **`/robots.txt`** : autorise l'indexation du site public et bloque `/admin`.
- **En-têtes de sécurité** (`X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`) appliqués automatiquement à toutes les réponses via `App\Http\Middleware\SecurityHeaders`.
- **Pages d'erreur personnalisées** aux couleurs de DISMAT pour les erreurs 403, 404, 419, 429 et 500 (`resources/views/errors/`), autonomes (sans dépendance aux assets compilés ni à la base de données) pour rester fiables même en cas de panne.
- **Tableau de bord admin** (`/admin`) avec un widget de statistiques en un coup d'œil : produits actifs, services actifs, articles publiés, messages non lus.
- **Point de contrôle de santé** `/up` (fourni nativement par Laravel 11) à utiliser pour le monitoring/health check de votre hébergeur.
- **Tests automatisés** (`tests/Feature/`) couvrant les pages publiques, le formulaire de contact (y compris l'envoi d'email et la limite de fréquence), le sitemap et les en-têtes de sécurité — lancez-les avec `php artisan test`.

## Déploiement en production

Avant la mise en ligne :

1. `APP_ENV=production` et `APP_DEBUG=false` dans `.env` — **indispensable** : `APP_DEBUG=true` en production expose des informations sensibles (chemins serveur, variables d'environnement) en cas d'erreur.
2. `APP_URL` renseigné avec le vrai nom de domaine (ex. `https://www.dismatsn.com`) — utilisé pour générer les liens absolus (sitemap, emails).
3. Générer une nouvelle `APP_KEY` dédiée à la production si ce n'est pas déjà fait (`php artisan key:generate --force`).
4. `composer install --optimize-autoloader --no-dev`
5. `npm install && npm run build`
6. `php artisan migrate --force` (sans `--seed`, sauf si vous voulez conserver les données de démo le temps de remplir le vrai contenu)
7. `php artisan storage:link` (si ce n'est pas déjà fait — nécessaire pour que les photos uploadées depuis l'admin s'affichent)
8. `php artisan filament:assets` — **indispensable** : publie les CSS/JS compilés du back-office Filament dans `public/css/filament` et `public/js/filament`. Sans cette étape, `/admin` s'affiche sans aucune mise en forme (police par défaut, icônes énormes, mise en page cassée). C'est une commande distincte de `npm run build`, qui ne concerne que le site public.
9. `php artisan config:cache && php artisan route:cache && php artisan view:cache` (à refaire après chaque modification de `.env` ou des routes/vues en production)
10. Configurer un vrai fournisseur d'email (`MAIL_MAILER=smtp` + identifiants) pour que les notifications de contact partent réellement.
11. **Changer le mot de passe administrateur par défaut** (ou créer un nouveau compte admin et supprimer `admin@dismatsn.com`).
12. Pointer le serveur web (Nginx/Apache) vers le dossier `public/` (jamais la racine du projet).
13. Activer HTTPS (Let's Encrypt via votre hébergeur, par exemple) — un certificat SSL est indispensable pour un site professionnel avec formulaire de contact.
14. Une fois le nom de domaine final connu, ajoutez-le à `public/robots.txt` sous la forme `Sitemap: https://votre-domaine/sitemap.xml`.
15. Soumettez `https://votre-domaine/sitemap.xml` à Google Search Console pour accélérer l'indexation.

Après le déploiement, vérifiez que `https://votre-domaine/up` répond bien (code 200) : c'est le point de contrôle de santé à utiliser pour le monitoring automatique de votre hébergeur.

## Stockage des images en production (important sur Laravel Cloud et hébergements similaires)

Sur un serveur classique (VPS), les photos uploadées depuis `/admin` sont écrites sur le disque du serveur (`storage/app/public`) et y restent tant que vous ne les supprimez pas vous-même.

**Sur Laravel Cloud (et toute plateforme au disque éphémère : Railway, Render, Heroku...), ce n'est pas le cas** : à chaque nouveau déploiement (chaque `git push`), l'application tourne sur une instance fraîche dont le disque local est réinitialisé. Tout fichier écrit localement pendant l'exécution — donc toute photo uploadée depuis l'admin — disparaît au déploiement suivant, d'où le besoin de les recharger à chaque fois.

Le projet est déjà préparé pour ce cas : un disque de stockage **S3** (`config/filesystems.php`, disque `s3`) a été ajouté, et tous les uploads (produits, actualités) passent déjà par `config('filesystems.default')` plutôt que par un disque local codé en dur. Il reste à activer un vrai stockage objet persistant côté hébergement — en suivant **précisément** ces étapes (Laravel Cloud utilise Cloudflare R2, qui a deux particularités importantes expliquées ci-dessous) :

1. Dans le tableau de bord **Laravel Cloud**, ouvrez votre environnement et cliquez sur « Add bucket » pour créer/attacher un bucket **Laravel Object Storage**.
2. En le créant, donnez-lui le nom de disque **`s3`** (champ « disk name ») — c'est le nom déjà utilisé dans `config/filesystems.php` ; un autre nom fonctionnerait aussi mais il faudrait alors modifier ce fichier pour qu'il corresponde. Cochez aussi « default disk » pour cet environnement.
3. Choisissez la visibilité **« Public »** au moment de la création (elle ne peut pas être changée facilement après coup) — sans ça, les images uploadées resteraient privées et ne s'afficheraient jamais sur le site public.
4. Une fois le bucket attaché, allez dans les réglages du bucket et copiez son **URL publique**. Laravel Cloud ne l'injecte pas automatiquement comme variable d'environnement : ajoutez-la vous-même dans les variables d'environnement personnalisées de l'environnement sous le nom `AWS_URL`.
5. Redéployez (un nouveau `git push` suffit, ou un redéploiement manuel depuis le tableau de bord) : la dépendance `league/flysystem-aws-s3-v3`, déjà ajoutée à `composer.json`, sera installée automatiquement par `composer install`, et Laravel Cloud injectera `FILESYSTEM_DISK=s3` ainsi que les identifiants `AWS_*` pour cet environnement.
6. **Rechargez les photos déjà présentes dans l'admin** (produits, actualités) : celles uploadées avant ce changement ont été perdues avec l'ancien disque éphémère et ne peuvent pas être récupérées automatiquement. Une fois rechargées sur le nouveau stockage S3, elles resteront définitivement, même après de futurs déploiements.

**Piège à connaître :** Cloudflare R2 gère la visibilité au niveau du bucket entier (choisie à l'étape 3 ci-dessus) et ne supporte pas les permissions par fichier — si le code tente de définir un fichier comme « public » individuellement (ce qu'on appelle un ACL), R2 refuse purement et simplement l'upload avec une erreur « NotImplemented », et le fichier n'apparaît jamais. `config/filesystems.php` est déjà configuré correctement pour éviter ce piège (sans réglage de visibilité par fichier) ; si malgré tout un upload échoue, vérifiez en priorité les points 2 et 3 ci-dessus (nom du disque et visibilité du bucket).

Si vous déployez plutôt sur un VPS classique avec disque persistant, vous n'avez rien à faire : `FILESYSTEM_DISK=public` (déjà dans `.env.example`) continue d'utiliser le stockage local normalement.

## Structure du projet

```
app/
  Filament/Resources/   → back-office (CRUD catégories, produits, services, articles, messages)
  Filament/Widgets/     → widget de statistiques du tableau de bord admin
  Http/Controllers/     → contrôleurs du site public (+ SitemapController)
  Http/Middleware/      → SecurityHeaders (en-têtes de sécurité appliqués à toutes les réponses)
  Mail/                 → ContactMessageReceived (email de notification de contact)
  Models/                → Category, Product, Service, Article, ContactMessage, User
config/dismat.php        → coordonnées et informations légales de l'entreprise
database/migrations/     → schéma PostgreSQL
database/seeders/        → contenu de démonstration
resources/views/         → vues Blade du site public (Tailwind CSS)
resources/views/emails/  → gabarit de l'email de notification de contact
resources/views/errors/  → pages d'erreur personnalisées (403, 404, 419, 429, 500)
routes/web.php           → routes du site public (+ /sitemap.xml)
tests/Feature/            → tests automatisés (pages publiques, contact, sitemap, sécurité)
```

## Note technique

Ce projet a été généré sans exécution de `composer install` / `npm install` dans l'environnement de génération (accès réseau à Packagist non disponible dans ce contexte). Le code a été relu et le schéma de base de données validé directement contre un PostgreSQL réel. Suivez simplement les étapes d'installation ci-dessus dans votre propre environnement.
