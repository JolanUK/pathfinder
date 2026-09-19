<?php

namespace App\Filament\Account\Pages;

use App\Enums\NavigationGroups;
use App\Models\Participant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AccountPathway extends Page
{
    protected static ?string $title = 'Pathway Information';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMap;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Participant;

    protected static ?string $slug = 'pathway-information';

    protected string $view = 'filament.account.pages.account-pathway';

    public ?array $data = [];

    public Participant $participant;

    public function mount()
    {
        if ($this->getRecord()) {
            $this->form->fill($this->getRecord()?->attributesToArray());
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Select::make('referrer')
                        ->columnSpan(2)
                        ->label('Referrer(s)')
                        ->options(collect(config('participant.referrers'))
                            ->mapWithKeys(fn ($referrer) => [$referrer => $referrer])
                            ->toArray())
                        ->rules(['required']),
                    TextInput::make('referrer_other')
                        ->columnSpan(2)
                        ->label('Referrer (other)')
                        ->required(fn (Get $get): string => $get('referrer') === 'Other')
                        ->visible(fn (Get $get): string => $get('referrer') === 'Other'),
                ])
                    ->columns(2)
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ])
                    ->livewireSubmitHandler('save')
                    ->reactive(),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (! $record) {
            $data['user_id'] = auth()->id();
            $record = new Participant;
        }

        $record->fill($data);
        $record->save();

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Saved')
            ->send();
    }

    public function getRecord(): ?Participant
    {
        return Participant::query()
            ->where('user_id', auth()->id())
            ->first();
    }
}
