<?php

namespace App\Filament\Resources\Terms\Resources\Courses;

use App\Filament\Resources\Terms\Resources\Courses\Pages\CourseModules;
use App\Filament\Resources\Terms\Resources\Courses\Pages\CreateCourse;
use App\Filament\Resources\Terms\Resources\Courses\Pages\EditCourse;
use App\Filament\Resources\Terms\Resources\Courses\Pages\ViewCourse;
use App\Filament\Resources\Terms\Resources\Courses\RelationManagers\FacilitatorsRelationManager;
use App\Filament\Resources\Terms\Resources\Courses\RelationManagers\ModulesRelationManager;
use App\Filament\Resources\Terms\Resources\Courses\RelationManagers\TermsRelationManager;
use App\Filament\Resources\Terms\Resources\Courses\Schemas\CourseForm;
use App\Filament\Resources\Terms\Resources\Courses\Schemas\CourseInfolist;
use App\Filament\Resources\Terms\Resources\Courses\Tables\CoursesTable;
use App\Filament\Resources\Terms\TermResource;
use App\Models\Course;
use BackedEnum;
use Filament\Resources\Pages\Page;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = TermResource::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CourseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationGroup::make('Course', [
                'terms' => TermsRelationManager::class,
                'modules' => ModulesRelationManager::class,
                'facilitators' => FacilitatorsRelationManager::class,
            ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'create' => CreateCourse::route('/create'),
            'view' => ViewCourse::route('/{record}'),
            'edit' => EditCourse::route('/{record}/edit'),
            'modules' => CourseModules::route('/{record}/modules'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewCourse::class,
            EditCourse::class,
            CourseModules::class,
        ]);
    }
}
