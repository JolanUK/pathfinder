<?php

namespace App\Filament\Account\Pages;

use App\Enums\NavigationGroups;
use App\Models\Participant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AccountBasic extends Page
{
    protected static ?string $title = 'Basic Information';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Participant;

    protected static ?string $slug = 'basic-information';

    protected string $view = 'filament.account.pages.account-basic';

    public ?array $data = [];

    public Participant $participant;

    public function mount()
    {
        $this->form->fill($this->getRecord()?->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    TextInput::make('first_name')
                        ->label('First name')
                        ->live(debounce: 500)
                        ->rules(['alpha_dash', 'max:255', 'min:2', 'required']),
                    TextInput::make('surname')
                        ->label('Surname')
                        ->live(debounce: 500)
                        ->rules(['alpha_dash', 'max:255', 'min:2', 'required']),
                    Group::make()
                        ->columnSpan(2)
                        ->live(debounce: 500)
                        ->relationship('user')
                        ->schema([
                            TextInput::make('email')
                                ->label('Email address')
                                ->live(debounce: 500)
                                ->rules(['email', 'max:255', 'min:2', 'required']),
                        ]),
                    Select::make('subject_pronoun')
                        ->label('Subject Pronoun')
                        ->live(debounce: 500)
                        ->options(collect(config('participant.subjectPronouns'))
                            ->mapWithKeys(fn ($pronoun) => [$pronoun => $pronoun])
                            ->toArray())
                        ->rules(['required']),
                    Select::make('object_pronoun')
                        ->label('Object Pronoun')
                        ->live(debounce: 500)
                        ->options(collect(config('participant.objectPronouns'))
                            ->mapWithKeys(fn ($pronoun) => [$pronoun => $pronoun])
                            ->toArray())
                        ->rules(['required']),
                    DatePicker::make('dob')
                        ->closeOnDateSelection()
                        ->columnSpan(2)
                        ->displayFormat('M j, Y')
                        ->label('Date of Birth')
                        ->live(debounce: 500)
                        ->maxDate(now()->subYears(config('participant.minimumAge')))
                        ->native(false)
                        ->rules(['required']),
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
