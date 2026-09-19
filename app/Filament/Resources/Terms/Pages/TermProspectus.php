<?php

namespace App\Filament\Resources\Terms\Pages;

use App\Filament\Resources\Terms\TermResource;
use App\Mason\TermCollection;
use Awcodes\Mason\Mason;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Override;
use Spatie\Browsershot\Browsershot;

class TermProspectus extends EditRecord
{
    protected static string $resource = TermResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentText;

    protected static ?string $navigationLabel = 'Prospectus';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Mason::make('prospectus')
                    ->bricks(TermCollection::make())
                    ->doubleClickToEdit()
                    ->previewLayout('components.layouts.mason-preview')
                    ->extraInputAttributes(['style' => 'min-height: 30rem;'])
                    ->displayActionsAsGrid()
                    ->colorModeToggle()
                    ->columnSpanFull(),
            ]);
    }

    #[Override]
    protected function getFormActions(): array
    {
        return [
            ...parent::getFormActions(),
            Action::make('pdf')
                ->action(function () {

                    $html = view('filament.pdf.prospectus', ['data' => $this->data['prospectus']])->render();

                    $pdf = Browsershot::html($html)
                        ->setNodeBinary('/Users/development/.nvm/versions/node/v24.18.0/bin/node')
                        ->setNpmBinary('/Users/development/.nvm/versions/node/v24.18.0/bin/npm')
                        ->showBackground()
                        ->pdf();

                    $path = storage_path('app/public/'.uniqid().'.pdf');
                    file_put_contents($path, $pdf);

                    return response()->download($path)->deleteFileAfterSend();
                }),
        ];
    }

    #[Override]
    public function getRelationManagers(): array
    {
        return [];
    }
}
