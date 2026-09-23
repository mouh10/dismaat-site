<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Contenu';

    protected static ?string $navigationLabel = 'Messages de contact';

    protected static ?string $modelLabel = 'message';

    protected static ?string $pluralModelLabel = 'messages de contact';

    protected static ?int $navigationSort = 5;

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::where('is_read', false)->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    TextInput::make('name')->label('Nom')->disabled(),
                    TextInput::make('email')->label('Email')->disabled(),
                    TextInput::make('phone')->label('Téléphone')->disabled(),
                    TextInput::make('subject')->label('Sujet')->disabled(),
                    Textarea::make('message')->label('Message')->rows(6)->disabled()->columnSpanFull(),
                    Toggle::make('is_read')->label('Traité / lu'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('is_read')->label('Lu')->boolean(),
                TextColumn::make('created_at')->label('Reçu le')->dateTime('d/m/Y H:i')->sortable(),
                TextColumn::make('name')->label('Nom')->searchable(),
                TextColumn::make('email')->label('Email')->searchable()->copyable(),
                TextColumn::make('phone')->label('Téléphone'),
                TextColumn::make('subject')->label('Sujet')->limit(40),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_read')->label('Lu'),
            ])
            ->actions([
                Action::make('markAsRead')
                    ->label('Marquer lu')
                    ->icon('heroicon-o-check')
                    ->visible(fn (ContactMessage $record) => ! $record->is_read)
                    ->action(fn (ContactMessage $record) => $record->update(['is_read' => true])),
                DeleteAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
}
