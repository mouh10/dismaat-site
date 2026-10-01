@php
    // Page d'erreur générique, volontairement autonome (pas de @vite, pas de
    // dépendance à la base de données) : elle doit pouvoir s'afficher même si
    // les assets ne sont pas compilés ou si la base de données est injoignable.
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>{{ $title }} — DISMAT</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #F6F7FA;
            color: #13294B;
        }
        .wrap { max-width: 480px; text-align: center; }
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border-radius: 10px;
            background: #13294B;
            color: #fff;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 28px;
        }
        .code {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #C9A24A;
            margin: 0 0 10px 0;
        }
        h1 {
            font-size: 26px;
            font-weight: 800;
            margin: 0 0 14px 0;
            line-height: 1.3;
        }
        p {
            font-size: 15px;
            line-height: 1.6;
            color: #5A6478;
            margin: 0 0 28px 0;
        }
        .actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
        a.btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
        }
        a.btn-primary { background: #13294B; color: #ffffff; }
        a.btn-outline { background: transparent; color: #13294B; border: 1.5px solid #13294B; }
    </style>
</head>
<body>
    <div class="wrap">
        <span class="badge">D</span>
        <p class="code">Erreur {{ $code }}</p>
        <h1>{{ $title }}</h1>
        <p>{{ $message }}</p>
        <div class="actions">
            <a href="/" class="btn btn-primary">Retour à l'accueil</a>
            <a href="/contact" class="btn btn-outline">Nous contacter</a>
        </div>
    </div>
</body>
</html>
