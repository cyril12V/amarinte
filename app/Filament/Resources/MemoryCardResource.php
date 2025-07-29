<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoryCardResource\Pages;
use App\Filament\Resources\MemoryCardResource\RelationManagers;
use App\Models\MemoryCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;

class MemoryCardResource extends Resource
{
    protected static ?string $model = MemoryCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListMemoryCards::route('/'),
            'create' => Pages\CreateMemoryCard::route('/create'),
            'edit' => Pages\EditMemoryCard::route('/{record}/edit'),
        ];
    }
}
