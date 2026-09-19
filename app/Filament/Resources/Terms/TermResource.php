<?php

namespace App\Filament\Resources\Terms;

use App\Enums\NavigationGroups;
use App\Filament\Resources\Terms\Pages\CreateTerm;
use App\Filament\Resources\Terms\Pages\EditTerm;
use App\Filament\Resources\Terms\Pages\ListTerms;
use App\Filament\Resources\Terms\Pages\TermContent;
use App\Filament\Resources\Terms\Pages\TermCourses;
use App\Filament\Resources\Terms\Pages\TermEnrolments;
use App\Filament\Resources\Terms\Pages\TermProspectus;
use App\Filament\Resources\Terms\Pages\TermStats;
use App\Filament\Resources\Terms\Pages\ViewTerm;
use App\Filament\Resources\Terms\RelationManagers\CoursesRelationManager;
use App\Filament\Resources\Terms\RelationManagers\EnrolmentsRelationManager;
use App\Filament\Resources\Terms\Schemas\TermForm;
use App\Filament\Resources\Terms\Schemas\TermInfolist;
use App\Filament\Resources\Terms\Tables\TermsTable;
use App\Models\Term;
use BackedEnum;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TermResource extends Resource
{
    protected static ?string $model = Term::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Courses;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'info';
    }

    public static function form(Schema $schema): Schema
    {
        return TermForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TermInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TermsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
            EnrolmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTerms::route('/'),
            'create' => CreateTerm::route('/create'),
            'view' => ViewTerm::route('/{record}'),
            'edit' => EditTerm::route('/{record}/edit'),
            'stats' => TermStats::route('/{record}/stats'),
            'enrolments' => TermEnrolments::route('/{record}/enrolments'),
            'courses' => TermCourses::route('/{record}/courses'),
            'content' => TermContent::route('/{record}/content'),
            'prospectus' => TermProspectus::route('/{record}/prospectus'),
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            ViewTerm::class,
            EditTerm::class,
            TermCourses::class,
            TermEnrolments::class,
            TermContent::class,
            TermProspectus::class,
            TermStats::class,
        ]);
    }
}
