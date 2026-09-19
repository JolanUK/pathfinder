<?php

namespace App\Filament\Resources\Terms\RelationManagers;

use App\Filament\Resources\Enrolments\EnrolmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class EnrolmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'enrolments';

    protected static ?string $relatedResource = EnrolmentResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ])
            ->groupingSettingsHidden(true);
    }
}
