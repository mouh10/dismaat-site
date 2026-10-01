@include('errors.minimal', [
    'code' => 429,
    'title' => 'Trop de requêtes',
    'message' => "Vous avez effectué trop de tentatives en peu de temps. Merci de patienter une minute avant de réessayer.",
])
