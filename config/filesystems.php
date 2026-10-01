<?php

use Illuminate\Support\Facades\Storage;

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        // Stockage objet compatible S3 (utilisé en production sur les hébergements
        // à disque éphémère, comme Laravel Cloud : les fichiers écrits sur le disque
        // local du serveur ne survivent pas aux redéploiements ou à la mise à l'échelle,
        // il faut donc un stockage externe persistant pour les photos uploadées depuis
        // l'admin. Voir la section « Stockage des images en production » du README.
        //
        // Laravel Cloud (Cloudflare R2) injecte AWS_REGION et AWS_ENDPOINT_URL ; les
        // identifiants S3 « classiques » utilisent plutôt AWS_DEFAULT_REGION/AWS_ENDPOINT
        // — les deux sont acceptées ici pour rester compatible avec les deux cas.
        //
        // Important : pas de 'visibility' => 'public' ici. Cloudflare R2 gère la
        // visibilité au niveau du bucket (choisie à sa création dans le tableau de
        // bord Laravel Cloud) et renvoie une erreur « NotImplemented » si Flysystem
        // tente de définir un ACL par fichier — ce qui empêchait tout upload de
        // fonctionner.
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_REGION', env('AWS_DEFAULT_REGION')),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT_URL', env('AWS_ENDPOINT')),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
