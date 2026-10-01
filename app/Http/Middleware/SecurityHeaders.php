<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ajoute un socle d'en-têtes de sécurité de base à toutes les réponses du
 * site public et du back-office. Ces en-têtes n'imposent aucune dépendance
 * externe et sont sans risque de casser l'affichage, contrairement à une
 * Content-Security-Policy stricte (laissée volontairement de côté ici pour
 * ne pas bloquer les polices Google Fonts / l'éditeur Filament sans réglage
 * fin préalable).
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        return $response;
    }
}
