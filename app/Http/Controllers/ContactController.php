<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['prohibited'], // champ piège anti-spam (honeypot)
        ], [
            'name.required' => 'Merci d\'indiquer votre nom.',
            'email.required' => 'Merci d\'indiquer votre adresse email.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
            'message.required' => 'Merci de saisir votre message.',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        // Le message est déjà enregistré en base à ce stade (source de vérité).
        // L'envoi de l'email de notification ne doit jamais faire échouer la
        // soumission du formulaire : une panne du fournisseur d'email ne doit
        // pas empêcher le visiteur de voir son message pris en compte.
        try {
            Mail::to(config('dismat.contact_notify_email'))
                ->send(new ContactMessageReceived($contactMessage));
        } catch (\Throwable $e) {
            Log::warning('Échec de l\'envoi de l\'email de notification de contact.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $e->getMessage(),
            ]);
        }

        return back()->with('success', 'Votre message a bien été envoyé. Notre équipe vous répondra dans les plus brefs délais.');
    }
}
