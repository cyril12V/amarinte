<?php

namespace App\Filament\Resources\PartnershipResource\Pages;

use App\Filament\Resources\PartnershipResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePartnership extends CreateRecord
{
    protected static string $resource = PartnershipResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Créer un autre partenaire'),
        ];
    }
}
