<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Enrolments\EnrolmentResource;
use App\Filament\Resources\Participants\ParticipantResource;
use App\Filament\Resources\Terms\TermResource;
use App\Models\Enrolment;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class TermEnrolments extends ManageRelatedRecords
{
    protected static string $resource = TermResource::class;

    protected static string $relationship = 'enrolments';

    protected static ?string $relatedResource = EnrolmentResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    public static function getNavigationBadge(): ?string
    {
        return self::getResource()::getModel()::find(request()->route()->parameter('record'))?->enrolments()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultGroup('enrolmentCourse.title')
            ->groupingSettingsHidden(true)
            ->groups([
                Group::make('enrolmentCourse.title')
                    ->titlePrefixedWithLabel(false),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                Action::make('view')
                    ->icon(Heroicon::Eye)
                    ->url(fn (Enrolment $record): string => ParticipantResource::getUrl('view', ['record' => $record->enrolmentParticipant->id])),
            ])
            ->recordUrl(null);
    }
}
