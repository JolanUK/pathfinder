<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Terms\Resources\Courses\CourseResource;
use App\Filament\Resources\Terms\TermResource;
use BackedEnum;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TermCourses extends ManageRelatedRecords
{
    protected static string $resource = TermResource::class;

    protected static string $relationship = 'courses';

    protected static ?string $relatedResource = CourseResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    public static function getNavigationBadge(): ?string
    {
        return self::getResource()::getModel()::find(request()->route()->parameter('record'))?->courses()->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultGroup('course_type')
            ->headerActions([
                AttachAction::make()
                    ->label('Attach Existing Course'),
                CreateAction::make(),
            ])
            ->recordActions([
                DetachAction::make(),
            ]);
    }
}
