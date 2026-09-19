<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Terms\TermResource;
use App\Mason\TermCollection;
use Awcodes\Mason\Mason;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Override;

class TermContent extends EditRecord
{
    use InteractsWithRecord;

    protected static string $resource = TermResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $navigationLabel = 'Page Content';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Mason::make('content')
                    ->bricks(TermCollection::make())
                    ->live(debounce: 500)
                    ->doubleClickToEdit()
                    ->previewLayout('components.layouts.mason-preview')
                    ->extraInputAttributes(['style' => 'min-height: 30rem;'])
                    ->colorModeToggle()
                    ->columnSpanFull(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    #[Override]
    public function getRelationManagers(): array
    {
        return [];
    }
}
