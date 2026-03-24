<?php

namespace App\Filament\Resources\Prospectuses\Pages;

use App\Filament\Resources\Prospectuses\ProspectusResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProspectus extends ViewRecord
{
    protected static string $resource = ProspectusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
