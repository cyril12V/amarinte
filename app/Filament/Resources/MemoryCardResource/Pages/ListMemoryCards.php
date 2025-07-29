<?php

namespace App\Filament\Resources\MemoryCardResource\Pages;

use App\Filament\Resources\MemoryCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoryCards extends ListRecords
{
    protected static string $resource = MemoryCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
