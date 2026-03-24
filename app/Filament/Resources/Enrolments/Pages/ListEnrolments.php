<?php

namespace App\Filament\Resources\Enrolments\Pages;

use App\Filament\Resources\Enrolments\EnrolmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnrolments extends ListRecords
{
    protected static string $resource = EnrolmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
