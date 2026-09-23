<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Contenu';

    protected static ?string $navigationLabel = 'Actualités';

    protected static ?string $modelLabel = 'article';

    protected static ?string $pluralModelLabel = 'actualités';

    protected static ?int $navigationSort = 4;

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

                    TextInput::make('author')
                        ->label('Auteur')
                        ->default('DISMAT')
                        ->maxLength(255),

                    DateTimePicker::make('published_at')
                        ->label('Date de publication')
                        ->native(false),

                    TextInput::make('excerpt')
                        ->label('Résumé (liste des actualités)')
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Textarea::make('content')
                        ->label('Contenu de l\'article')
                        ->rows(8)
                        ->columnSpanFull(),

                    FileUpload::make('image')
                        ->label('Image de couverture')
                        ->image()
                        ->directory('articles')
                        ->disk('public')
                        ->imageEditor()
                        ->columnSpanFull(),

                    Toggle::make('is_published')
                        ->label('Publié')
                        ->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('')->disk('public')->square(),
                TextColumn::make('title')->label('Titre')->searchable()->sortable(),
                TextColumn::make('published_at')->label('Publié le')->date('d/m/Y')->sortable(),
                IconColumn::make('is_published')->label('Publié')->boolean(),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
