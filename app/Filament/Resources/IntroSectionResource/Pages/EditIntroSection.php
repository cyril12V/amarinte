<?php

namespace App\Filament\Resources\IntroSectionResource\Pages;

use App\Filament\Resources\IntroSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntroSection extends EditRecord
{
    protected static string $resource = IntroSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
