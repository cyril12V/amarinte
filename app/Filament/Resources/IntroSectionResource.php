<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IntroSectionResource\Pages;
use App\Filament\Resources\IntroSectionResource\RelationManagers;
use App\Models\IntroSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IntroSectionResource extends Resource
{
    protected static ?string $model = IntroSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $modelLabel = 'Section d\'introduction';
    
    protected static ?string $pluralModelLabel = 'Sections d\'introduction';
    
    protected static ?string $navigationLabel = 'Textes d\'introduction';
    
    protected static ?string $navigationGroup = 'Partenariats';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('page')
                    ->default('partnerships'),
                TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('content')
                    ->label('Contenu')
                    ->required()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'redo',
                        'undo',
                        'h2',
                        'h3',
                        'paragraph',
                        'bulletList',
                        'orderedList',
                    ])
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Statut')
                    ->options([
                        'brouillon' => 'Brouillon',
                        'publié' => 'Publié',
                    ])
                    ->default('publié')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'publié' => 'success',
                        'brouillon' => 'warning',
                    }),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime()
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
            'index' => Pages\ListIntroSections::route('/'),
            'create' => Pages\CreateIntroSection::route('/create'),
            'edit' => Pages\EditIntroSection::route('/{record}/edit'),
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('page', 'partnerships');
    }
}
