<?php

namespace App\Filament\Resources\ReferenceResource\Pages;

use App\Filament\Resources\ReferenceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReference extends CreateRecord
{
    protected static string $resource = ReferenceResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer une autre référence'),
        ];
    }
}
