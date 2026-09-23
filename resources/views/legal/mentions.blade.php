@extends('layouts.app')

@section('title', 'Mentions légales')

@section('content')

    <x-page-header title="Mentions légales" />

    <section class="section">
        <div class="container-dismat max-w-3xl">
            <div class="prose prose-slate max-w-none text-slate-600">
                <p><strong>Raison sociale :</strong> {{ config('dismat.name') }}</p>
                <p><strong>Adresse :</strong> {{ config('dismat.address_line') }}, {{ config('dismat.city') }} — {{ config('dismat.po_box') }}</p>
                <p><strong>Téléphone :</strong> {{ config('dismat.phone') }} — <strong>Fax :</strong> {{ config('dismat.fax') }}</p>
                <p><strong>Email :</strong> {{ config('dismat.email') }}</p>
                <p><strong>Registre du Commerce :</strong> {{ config('dismat.rc') }}</p>
                <p><strong>NINEA :</strong> {{ config('dismat.ninea') }}</p>
                <p><strong>Coordonnées bancaires (règlement de factures) :</strong> {{ config('dismat.bank.name') }} — {{ config('dismat.bank.iban') }}</p>

                <h2>Hébergement</h2>
                <p>Ce site est édité et exploité par {{ config('dismat.name') }}. Les informations d'hébergement seront précisées ici selon le prestataire choisi lors de la mise en production.</p>

                <h2>Propriété intellectuelle</h2>
                <p>L'ensemble des contenus présents sur ce site (textes, images, logo) est la propriété de {{ config('dismat.name') }}, sauf mention contraire, et ne peut être reproduit sans autorisation préalable.</p>
            </div>
        </div>
    </section>

@endsection
