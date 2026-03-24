<?php

namespace App\Filament\Resources\Prospectuses\Pages;

use App\Filament\Resources\Prospectuses\ProspectusResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProspectus extends EditRecord
{
    protected static string $resource = ProspectusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
