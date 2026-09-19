<?php

namespace App\Filament\Account\Pages;

use App\Enums\NavigationGroups;
use App\Enums\YesNo;
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

class AccountEmergency extends Page
{
    protected static ?string $title = 'Emergency Contact';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedExclamationTriangle;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Participant;

    protected static ?string $slug = 'emergency-contact';

    protected string $view = 'filament.account.pages.account-emergency';

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
                    Select::make('emergency_consent')
                        ->columnSpan(2)
                        ->label('Emergency Consent')
                        ->live(debounce: 500)
                        ->options(YesNo::class)
                        ->rules(['required']),
                    TextInput::make('emergency_first_name')
                        ->label('First name')
                        ->live(debounce: 500)
                        ->required(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes')
                        ->rules(['alpha_dash', 'min:2', 'max:255'])
                        ->visible(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes'),
                    TextInput::make('emergency_surname')
                        ->label('Surname')
                        ->live(debounce: 500)
                        ->required(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes')
                        ->rules(['alpha_dash', 'min:2', 'max:255'])
                        ->visible(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes'),
                    TextInput::make('emergency_relationship')
                        ->label('Relationship')
                        ->live(debounce: 500)
                        ->required(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes')
                        ->rules(['alpha_dash', 'min:2', 'max:255'])
                        ->visible(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes'),
                    TextInput::make('emergency_telephone')
                        ->label('Telephone')
                        ->live(debounce: 500)
                        ->required(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes')
                        ->rules(['min:2', 'max:255'])
                        ->visible(fn (Get $get): bool => $get('emergency_consent')?->value === 'Yes'),
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
