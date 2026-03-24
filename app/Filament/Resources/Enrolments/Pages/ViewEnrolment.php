<?php

namespace App\Filament\Resources\Enrolments\Pages;

use App\Filament\Resources\Enrolments\EnrolmentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEnrolment extends ViewRecord
{
    protected static string $resource = EnrolmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
