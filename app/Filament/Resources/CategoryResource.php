<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Catalogue';

    protected static ?string $navigationLabel = 'Catégories';

    protected static ?string $modelLabel = 'catégorie';

    protected static ?string $pluralModelLabel = 'catégories';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make()
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Nom')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

                    TextInput::make('slug')
                        ->label('Slug (URL)')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    TextInput::make('icon')
                        ->label('Icône (nom heroicon, optionnel)')
                        ->placeholder('ex: computer-desktop')
                        ->helperText('Voir la liste sur heroicons.com (style outline).')
                        ->columnSpan(1),

                    TextInput::make('order')
                        ->label('Ordre d\'affichage')
                        ->numeric()
                        ->default(0),

                    Textarea::make('description')
                        ->label('Description')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->label('#')->sortable(),
                TextColumn::make('name')->label('Nom')->searchable()->sortable(),
                TextColumn::make('slug')->label('Slug')->searchable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Produits'),
                TextColumn::make('created_at')
                    ->label('Créée le')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->filters([])
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
