<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouveau message de contact — DISMAT</title>
</head>
<body style="margin:0; padding:0; background-color:#EEF2F7; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#EEF2F7; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="560" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF; border-radius:8px; overflow:hidden; border:1px solid #DCE3ED;">
                    <tr>
                        <td style="background-color:#13294B; padding:24px 32px;">
                            <span style="display:inline-block; width:36px; height:36px; line-height:36px; text-align:center; background-color:rgba(255,255,255,0.1); color:#FFFFFF; font-weight:bold; font-size:16px; border-radius:6px; vertical-align:middle;">D</span>
                            <span style="color:#FFFFFF; font-size:16px; font-weight:bold; margin-left:10px; vertical-align:middle;">DISMAT — Nouveau message</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="margin:0 0 20px 0; font-size:14px; color:#5A6478; line-height:1.6;">
                                Un nouveau message a été envoyé depuis le formulaire de contact du site. Vous pouvez répondre directement à cet email, la réponse partira vers l'expéditeur.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:13px; color:#8993A6; width:120px;">Nom</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:14px; color:#13294B; font-weight:bold;">{{ $contactMessage->name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:13px; color:#8993A6;">Email</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:14px; color:#13294B; font-weight:bold;">{{ $contactMessage->email }}</td>
                                </tr>
                                @if ($contactMessage->phone)
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:13px; color:#8993A6;">Téléphone</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:14px; color:#13294B; font-weight:bold;">{{ $contactMessage->phone }}</td>
                                </tr>
                                @endif
                                @if ($contactMessage->subject)
                                <tr>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:13px; color:#8993A6;">Sujet</td>
                                    <td style="padding:10px 0; border-bottom:1px solid #EEF2F7; font-size:14px; color:#13294B; font-weight:bold;">{{ $contactMessage->subject }}</td>
                                </tr>
                                @endif
                            </table>

                            <p style="margin:20px 0 6px 0; font-size:13px; color:#8993A6;">Message</p>
                            <p style="margin:0; padding:16px; background-color:#EEF2F7; border-radius:6px; font-size:14px; color:#13294B; line-height:1.7; white-space:pre-line;">{{ $contactMessage->message }}</p>

                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin-top:28px;">
                                <tr>
                                    <td style="background-color:#13294B; border-radius:999px;">
                                        <a href="{{ url('/admin') }}" style="display:inline-block; padding:12px 24px; font-size:13px; font-weight:bold; color:#FFFFFF; text-decoration:none;">Voir dans le back-office</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:18px 32px; background-color:#EEF2F7; font-size:11px; color:#8993A6;">
                            Reçu le {{ $contactMessage->created_at?->translatedFormat('d F Y à H:i') }} depuis le formulaire de contact de dismatsn.com.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
