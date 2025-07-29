<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferenceResource\Pages;
use App\Filament\Resources\ReferenceResource\RelationManagers;
use App\Models\Reference;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReferenceResource extends Resource
{
    protected static ?string $model = Reference::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $modelLabel = 'Référence';
    
    protected static ?string $pluralModelLabel = 'Références';
    
    protected static ?string $navigationLabel = 'Références';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('logo')
                    ->label('Logo')
                    ->directory('references')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nom de l\'entreprise'),
                TextInput::make('sector')
                    ->required()
                    ->maxLength(255)
                    ->label('Secteur d\'activité'),
                TextInput::make('turnover')
                    ->required()
                    ->maxLength(255)
                    ->label('Chiffre d\'affaires (par ex: "25M€")'),
                TextInput::make('employees')
                    ->required()
                    ->numeric()
                    ->label('Nombre d\'employés'),
                TextInput::make('order')
                    ->label('Ordre d\'affichage')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Actif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Entreprise')
                    ->searchable(),
                TextColumn::make('sector')
                    ->label('Secteur'),
                TextColumn::make('turnover')
                    ->label('CA'),
                TextColumn::make('employees')
                    ->label('Effectif'),
                TextColumn::make('order')
                    ->label('Ordre'),
                ToggleColumn::make('is_active')
                    ->label('Actif'),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order');
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
            'index' => Pages\ListReferences::route('/'),
            'create' => Pages\CreateReference::route('/create'),
            'edit' => Pages\EditReference::route('/{record}/edit'),
        ];
    }
}
