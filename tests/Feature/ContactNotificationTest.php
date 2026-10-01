<?php

namespace Tests\Feature;

use App\Mail\ContactMessageReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_submitting_the_contact_form_sends_a_notification_email(): void
    {
        Mail::fake();

        $this->post(route('contact.store'), [
            'name' => 'Jean Client',
            'email' => 'jean.client@example.com',
            'subject' => 'Demande de devis',
            'message' => 'Bonjour, je souhaite un devis pour 10 ordinateurs.',
        ])->assertRedirect();

        Mail::assertSent(ContactMessageReceived::class, function (ContactMessageReceived $mail) {
            return $mail->contactMessage->email === 'jean.client@example.com'
                && $mail->hasTo(config('dismat.contact_notify_email'));
        });
    }

    public function test_contact_form_still_saves_the_message_even_if_mail_sending_fails(): void
    {
        Mail::shouldReceive('to')->once()->andReturnSelf();
        Mail::shouldReceive('send')->once()->andThrow(new \RuntimeException('SMTP indisponible'));

        $response = $this->post(route('contact.store'), [
            'name' => 'Awa Diop',
            'email' => 'awa.diop@example.com',
            'message' => 'Avez-vous ce modèle en stock ?',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_messages', [
            'email' => 'awa.diop@example.com',
        ]);
    }

    public function test_contact_form_is_rate_limited(): void
    {
        $payload = [
            'name' => 'Test Spam',
            'email' => 'spam@example.com',
            'message' => 'Message de test pour la limite de fréquence.',
        ];

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.store'), $payload);
        }

        $this->post(route('contact.store'), $payload)->assertStatus(429);
    }
}
