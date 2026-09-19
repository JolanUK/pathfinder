<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Terms\TermResource;
use App\Filament\Resources\Terms\Widgets\TermAttendanceIndex;
use App\Filament\Resources\Terms\Widgets\TermDemographicChart;
use App\Filament\Resources\Terms\Widgets\TermEnrolmentAgeIndex;
use App\Filament\Resources\Terms\Widgets\TermEnrolmentEthnicityIndex;
use App\Filament\Resources\Terms\Widgets\TermEnrolmentGenderIndex;
use App\Filament\Resources\Terms\Widgets\TermEnrolmentIndex;
use App\Filament\Resources\Terms\Widgets\TermEnrolmentWardIndex;
use BackedEnum;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Override;

class TermStats extends ViewRecord
{
    protected static string $resource = TermResource::class;

    protected static ?string $navigationLabel = 'Stats';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChartBar;

    #[Override]
    public function getTitle(): string|Htmlable
    {
        return 'Viewing stats for: '.parent::getRecordTitle();
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            TermEnrolmentIndex::class,
            TermAttendanceIndex::class,
            TermEnrolmentGenderIndex::class,
            TermEnrolmentAgeIndex::class,
            TermEnrolmentEthnicityIndex::class,
            TermEnrolmentWardIndex::class,
            TermDemographicChart::class,
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([]);
    }
}
