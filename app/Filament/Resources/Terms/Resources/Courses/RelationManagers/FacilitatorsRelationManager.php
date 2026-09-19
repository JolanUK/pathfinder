<?php

namespace App\Filament\Resources\Terms\Resources\Courses\RelationManagers;

use App\Filament\Resources\Enrolments\EnrolmentResource;
use Filament\Resources\RelationManagers\RelationManager;

class FacilitatorsRelationManager extends RelationManager
{
    protected static string $relationship = 'facilitators';

    protected static ?string $relatedResource = EnrolmentResource::class;

    protected static ?string $title = 'Facilitators';
}
