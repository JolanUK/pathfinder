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
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AccountDemographics extends Page
{
    protected static ?string $title = 'Demographic Information';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartPie;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Participant;

    protected static ?string $slug = 'demographic-information';

    protected string $view = 'filament.account.pages.account-demographics';

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
                    Select::make('disabilities')
                        ->columnSpan(3)
                        ->label('Disabilities')
                        ->live(debounce: 500)
                        ->options(YesNo::class)
                        ->rules(['required']),
                    TextInput::make('difficulties')
                        ->columnSpan(3)
                        ->label('Difficulties')
                        ->live(debounce: 500)
                        ->rules(['max:255', 'min:2', 'required']),
                    Select::make('ethnicity')
                        ->columnSpan(2)
                        ->label('Ethnicity')
                        ->live(debounce: 500)
                        ->options(collect(config('participant.ethnicities'))
                            ->mapWithKeys(fn ($ethnicity) => [$ethnicity => $ethnicity])
                            ->toArray())
                        ->rules(['required']),
                    Select::make('gender')
                        ->columnSpan(2)
                        ->label('Gender')
                        ->live(debounce: 500)
                        ->options(collect(config('participant.genders'))
                            ->mapWithKeys(fn ($gender) => [$gender => $gender])
                            ->toArray())
                        ->rules(['required']),
                    Select::make('age')
                        ->columnSpan(2)
                        ->label('Age Range')
                        ->live(debounce: 500)
                        ->options(collect(config('participant.ageRanges'))
                            ->mapWithKeys(fn ($ageRange) => [$ageRange => $ageRange])
                            ->toArray())
                        ->rules(['required']),
                ])
                    ->columns(6)
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
