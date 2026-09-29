<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AdminDashboardNavigationWidget;
use App\Models\User;
use BackedEnum;
use Filament\Forms\Components\CheckboxList;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Guava\Calendar\Concerns\CanRefreshCalendar;
use Illuminate\Support\Facades\Auth;
use Override;

class Dashboard extends BaseDashboard
{
    use CanRefreshCalendar, HasFiltersForm;

    protected static string | BackedEnum | null $navigationIcon = '';

    #[Override]
    public function getColumns(): int | array
    {
        return 1;
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            AdminDashboardNavigationWidget::class
        ];
    }

    #[Override]
    protected function getFooterWidgets(): array
    {
        return [
            
        ];
    }

    public function filtersForm(Schema $schema): Schema
    {
        $userFilter = [];
        $currentUser = [];
        $allStaff = [];

        $currentUser[auth()->user()->id] = __('Myself');

        $allStaff['all'] = __('All Staff');

        $staff = User::with('roles')->where('id', '!=', Auth::user()->id)->get()->filter(
            fn ($user) => $user->roles->where('name', 'staff')->isNotEmpty()
        )->pluck('name', 'id')->toArray();

        $userFilter = $currentUser + $allStaff + $staff;
        
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->heading(__('Staff'))
                    ->schema([
                        CheckboxList::make('staff')
                            ->hiddenLabel()
                            ->options(
                                $userFilter
                            )
                    ]),
            ]);
    }

    #[Override]
    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                
            ]);
    }
}
