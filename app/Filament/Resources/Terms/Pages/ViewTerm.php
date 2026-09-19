<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Terms\TermResource;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;
use Override;

class ViewTerm extends ViewRecord
{
    protected static string $resource = TermResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Eye;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    #[Override]
    public function getRelationManagers(): array
    {
        return [];
    }

    protected string $view = 'filament.resources.terms.pages.view-term';
}
