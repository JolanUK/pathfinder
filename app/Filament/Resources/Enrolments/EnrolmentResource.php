<?php

namespace App\Filament\Resources\Enrolments;

use App\Filament\Resources\Enrolments\Pages\CreateEnrolment;
use App\Filament\Resources\Enrolments\Pages\EditEnrolment;
use App\Filament\Resources\Enrolments\Pages\ListEnrolments;
use App\Filament\Resources\Enrolments\Pages\ViewEnrolment;
use App\Filament\Resources\Enrolments\Schemas\EnrolmentForm;
use App\Filament\Resources\Enrolments\Schemas\EnrolmentInfolist;
use App\Filament\Resources\Enrolments\Tables\EnrolmentsTable;
use App\Models\Enrolment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnrolmentResource extends Resource
{
    protected static ?string $model = Enrolment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return EnrolmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EnrolmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnrolmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEnrolments::route('/'),
            'create' => CreateEnrolment::route('/create'),
            'view' => ViewEnrolment::route('/{record}'),
            'edit' => EditEnrolment::route('/{record}/edit'),
        ];
    }
}
