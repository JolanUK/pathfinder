<?php

namespace App\Filament\Account\Resources\Enrolments\Pages;

use App\Filament\Account\Resources\Enrolments\EnrolmentResource;
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
