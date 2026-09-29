<?php

use App\Models\Enrolment;
use App\Settings\GlobalSettings;
use Filament\Actions\Concerns\InteractsWithActions;  
use Filament\Actions\Contracts\HasActions;
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
            ->query(Enrolment::query()->where('term_id', '=', app(GlobalSettings::class)->currentTerm))
            ->columns([
                TextColumn::make('user_id'),
            ])
            ->filters([
                // ...
            ])
            ->recordActions([
                // ...
            ])
            ->toolbarActions([
                // ...
            ])
            ->emptyStateHeading(__('There are no enrolments in the current live term.'))
            ->emptyStateDescription(__('If you believe this is in error, please reach out to the technical team.'))
            ->emptyStateIcon('heroicon-o-exclamation-triangle');
    }
};
?>

<div>
    {{ $this->table }}
</div>

{{-- @php
    use App\Models\User;

    $staff = User::with('roles')->get()->filter(
        fn ($user) => $user->roles->where('name', 'staff')->toArray()
    )->count();
@endphp

<div class="divide-y divide-keyline-primary dark:divide-keyline-primary-dark">
    <x-filament::link
        class="w-full pb-3 items-start justify-between"
        icon="heroicon-m-chevron-right"
        icon-position="after"
    >
        <span class="text-base text-content-primary dark:text-content-primary-dark block">{{ __('My availability') }}</span>
        <span class="text-sm text-content-primary/50 dark:text-content-primary-dark/50">{{ __('9am - 12pm | Remote') }}</span>

    </x-filament::link>

    <x-filament::link
        class="w-full py-3 items-start justify-between"
        icon="heroicon-m-chevron-right"
        icon-position="after"
    >
        <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('My tasks for today') }}</span>

        <x-filament::badge color="info" class="ml-2">
            {{ $staff }}
        </x-filament::badge>

    </x-filament::link>

    <x-filament::link
        class="w-full py-3 items-start justify-between"
        icon="heroicon-m-chevron-right"
        icon-position="after"
    >
        <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('My tasks for this week') }}</span>

        <x-filament::badge color="info" class="ml-2">
            {{ $staff }}
        </x-filament::badge>

    </x-filament::link>

    <x-filament::link
        class="w-full pt-3 items-start justify-between"
        icon="heroicon-m-chevron-right"
        icon-position="after"
    >
        <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('My tasks for September') }}</span>

        <x-filament::badge color="info" class="ml-2">
            {{ $staff }}
        </x-filament::badge>

    </x-filament::link>
</div> --}}