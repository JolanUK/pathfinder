<?php

use App\Models\User;
use App\Filament\Resources\Tasks\TaskResource;
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

new class extends Component
{
    public $staff;

    public function mount() {
        $this->staff = User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('name', 'staff')->toArray()
        )->count();

        return $this;
    }
};
?>

<div>
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
                {{ $this->staff }}
            </x-filament::badge>

        </x-filament::link>

        <x-filament::link
            class="w-full py-3 items-start justify-between"
            icon="heroicon-m-chevron-right"
            icon-position="after"
        >
            <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('My tasks for this week') }}</span>

            <x-filament::badge color="info" class="ml-2">
                {{ $this->staff }}
            </x-filament::badge>

        </x-filament::link>

        <x-filament::link
            class="w-full pt-3 items-start justify-between"
            icon="heroicon-m-chevron-right"
            icon-position="after"
        >
            <span class="text-base text-content-primary dark:text-content-primary-dark">{{ __('My tasks for September') }}</span>

            <x-filament::badge color="info" class="ml-2">
                {{ $this->staff }}
            </x-filament::badge>

        </x-filament::link>
    </div>

    <x-slot name="footer">
        <div class="flex justify-end gap-4">
            <x-filament::button
                size="sm"
                href="{{ TaskResource::getUrl('index') }}"
                color="primary"
                tag="a"
            >
                {{ __('View all') }}
            </x-filament::button>
        </div>
    </x-slot>
</div>