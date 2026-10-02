<?php

use App\Models\Enrolment;
use App\Settings\GlobalSettings;
use Filament\Actions\Concerns\InteractsWithActions;  
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\ViewAction;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Concerns\RestrictsFileUploadsToSchemaComponents;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

new class extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithSchemas;
    use InteractsWithTable;
    use RestrictsFileUploadsToSchemaComponents;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Enrolment::query()->where('term_id', '=', app(GlobalSettings::class)->currentTerm)->where('status', '=', 'Waitlist'))
            ->columns([
                TextColumn::make('enrolmentParticipant.full_name')
                    ->label(__('Name')),
                TextColumn::make('enrolmentCourse.title')
                    ->label(__('Course')),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'Waitlist' => 'warning',
                    }),
            ])
            ->filters([
                // ...
            ])
            ->recordActions([
                ViewAction::make()
            ])
            ->toolbarActions([
                // ...
            ])
            ->paginated(false)
            ->description(__('This view will only show a maximum of the latest 5 enrolments.'))
            ->emptyStateHeading(__('There are no enrolments in the current live term.'))
            ->emptyStateDescription(__('If you believe this is in error, please reach out to the technical team.'))
            ->emptyStateIcon('heroicon-o-exclamation-triangle')
            ->extraAttributes(['class' => 'fi-ta-custom-table-basic']);
    }
};
?>

<div>
    {{ $this->table }}

    <x-slot name="footer">
        <div class="flex justify-end gap-4">
            <x-filament::button
                size="sm"
                href="/"
                color="primary"
                tag="a"
            >
                {{ __('View all') }}
            </x-filament::button>
        </div>
    </x-slot>
</div>