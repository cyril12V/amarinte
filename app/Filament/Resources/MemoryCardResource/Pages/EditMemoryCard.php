<?php

namespace App\Filament\Resources\MemoryCardResource\Pages;

use App\Filament\Resources\MemoryCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoryCard extends EditRecord
{
    protected static string $resource = MemoryCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
