<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestationResource\Pages;
use App\Filament\Resources\PrestationResource\RelationManagers;
use App\Models\Prestation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;

class PrestationResource extends Resource
{
    protected static ?string $model = Prestation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Image Principale (Bannière)')
                    ->schema([
                        FileUpload::make('hero_image')
                            ->label('Importer l\'image de bannière')
                            ->image()
                            ->directory('prestations/heros')
                            ->required()
                            ->columnSpanFull(),
                    ])->collapsible(),

                Section::make('Contenu Principal de la Prestation')
                    ->schema([
                        TextInput::make('title')
                            ->label('Titre de la prestation')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Texte descriptif principal')
                            ->required()
                            ->columnSpanFull()
                            ->rows(6),
                        FileUpload::make('middle_image')
                            ->label('Importer l\'image du milieu (optionnelle)')
                            ->image()
                            ->directory('prestations/middle')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(1),

                Section::make('FORMAT')
                    ->schema([
                        TextInput::make('format_title')
                            ->label('Titre du bloc FORMAT')
                            ->required()
                            ->maxLength(255)
                            ->default('FORMAT'),
                        Textarea::make('format_content')
                            ->label('Contenu du bloc FORMAT')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(1)->collapsible(),

                Section::make('Memory Cards Associées')
                    ->schema([
                        Repeater::make('memoryCards')
                            ->relationship()
                            ->label('Ajouter/Modifier les Memory Cards')
                            ->addActionLabel('Ajouter une Memory Card')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image de la carte')
                                    ->image()
                                    ->directory('memory-cards')
                                    ->required(),
                                Select::make('continent')
                                    ->label('Continent')
                                    ->options([
                                        'afrique' => 'Afrique',
                                        'amerique_nord' => 'Amérique du Nord',
                                        'amerique_sud' => 'Amérique du Sud',
                                        'asie' => 'Asie',
                                        'europe' => 'Europe',
                                        'oceanie' => 'Océanie',
                                    ])
                                    ->required(),
                                TextInput::make('sector')
                                    ->label('Secteur d\'activité')
                                    ->required()
                                    ->placeholder('ex: Agroalimentaire')
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->label('Description courte (verso de la carte)')
                                    ->required()
                                    ->maxLength(400)
                                    ->rows(3),
                                Textarea::make('content')
                                    ->label('Contenu complet (pour le popup \'Voir plus\')')
                                    ->required(),
                            ])
                            ->orderColumn('order')
                            ->defaultItems(0)
                            ->columns(2)
                            ->collapsible()
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Publication')
                    ->schema([
                        Select::make('status')
                            ->label('Statut de la page')
                            ->options([
                                'draft' => 'Brouillon (non visible)',
                                'published' => 'Publié (visible)',
                            ])
                            ->required()
                            ->default('draft'),
                    ])->columns(1)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hero_image')
                    ->label('Bannière')
                    ->square()
                    ->height(50),
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('status')
                    ->label('Statut')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Brouillon',
                        'published' => 'Publié',
                        default => $state,
                    })
                    ->colors([
                        'warning' => 'draft',
                        'success' => 'published',
                    ])
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Dernière modification')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrestations::route('/'),
            'create' => Pages\CreatePrestation::route('/create'),
            'edit' => Pages\EditPrestation::route('/{record}/edit'),
        ];
    }
}
