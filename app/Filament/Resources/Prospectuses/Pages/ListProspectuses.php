<?php

namespace App\Filament\Resources\Prospectuses\Pages;

use App\Filament\Resources\Prospectuses\ProspectusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProspectuses extends ListRecords
{
    protected static string $resource = ProspectusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
