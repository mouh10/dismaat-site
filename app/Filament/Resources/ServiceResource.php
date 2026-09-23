<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Catalogue';

    protected static ?string $navigationLabel = 'Services';

    protected static ?string $modelLabel = 'service';

    protected static ?string $pluralModelLabel = 'services';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    TextInput::make('title')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                    TextInput::make('slug')
                        ->label('Slug (URL)')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    TextInput::make('icon')
                        ->label('Icône (nom heroicon, optionnel)')
                        ->placeholder('ex: truck'),

                    TextInput::make('order')
                        ->label('Ordre d\'affichage')
                        ->numeric()
                        ->default(0),

                    TextInput::make('short_description')
                        ->label('Résumé court')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('description')
                        ->label('Description détaillée')
                        ->rows(5)
                        ->columnSpanFull(),

                    Toggle::make('is_active')
                        ->label('Actif (visible sur le site)')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('#')->sortable(),
                TextColumn::make('title')->label('Titre')->searchable()->sortable(),
                TextColumn::make('short_description')->label('Résumé')->limit(60),
                IconColumn::make('is_active')->label('Actif')->boolean(),
            ])
            ->defaultSort('order')
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
