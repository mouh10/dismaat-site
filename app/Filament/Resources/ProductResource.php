<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Catalogue';

    protected static ?string $navigationLabel = 'Produits';

    protected static ?string $modelLabel = 'produit';

    protected static ?string $pluralModelLabel = 'produits';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informations générales')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Nom du produit')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state).'-'.Str::random(4))),

                    TextInput::make('slug')
                        ->label('Slug (URL)')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    Select::make('category_id')
                        ->label('Catégorie')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            TextInput::make('name')->required(),
                        ]),

                    TextInput::make('brand')
                        ->label('Marque')
                        ->maxLength(255),

                    TextInput::make('reference')
                        ->label('Référence / SKU')
                        ->maxLength(255),

                    TextInput::make('price')
                        ->label('Prix (FCFA)')
                        ->numeric()
                        ->prefix('FCFA')
                        ->helperText('Laisser vide pour afficher "Sur devis".'),

                    TextInput::make('short_description')
                        ->label('Résumé (liste produits)')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('description')
                        ->label('Description détaillée')
                        ->rows(5)
                        ->columnSpanFull(),
                ]),

            Section::make('Image et visibilité')
                ->columns(2)
                ->schema([
                    FileUpload::make('image')
                        ->label('Photo du produit')
                        ->image()
                        ->directory('products')
                        ->disk(config('filesystems.default'))
                        ->imageEditor()
                        ->columnSpanFull(),

                    Toggle::make('is_active')
                        ->label('Actif (visible sur le site)')
                        ->default(true),

                    Toggle::make('is_featured')
                        ->label('Mettre en avant sur l\'accueil'),

                    TextInput::make('order')
                        ->label('Ordre d\'affichage')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->disk(config('filesystems.default'))
                    ->square(),
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->badge(),
                TextColumn::make('brand')
                    ->label('Marque')
                    ->toggleable(),
                TextColumn::make('price')
                    ->label('Prix')
                    ->money('XOF')
                    ->placeholder('Sur devis')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('En avant')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->label('Actif')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Catégorie')
                    ->relationship('category', 'name'),
                TernaryFilter::make('is_active')->label('Actif'),
                TernaryFilter::make('is_featured')->label('En avant'),
            ])
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
