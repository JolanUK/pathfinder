<?php

namespace App\Filament\Account\Pages;

use App\Enums\NavigationGroups;
use App\Filament\Forms\Components\PostcodeField;
use App\Models\Participant;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class AccountContact extends Page
{
    protected static ?string $title = 'Contact Information';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Participant;

    protected static ?string $slug = 'contact-information';

    protected string $view = 'filament.account.pages.account-basic';

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
                    TextInput::make('telephone')
                        ->columnSpan(2)
                        ->label('Telephone')
                        ->live(debounce: 500)
                        ->rules(['required']),
                    Textarea::make('address')
                        ->columnSpan(2)
                        ->label('Address')
                        ->live(debounce: 500)
                        ->rules(['email', 'max:255', 'min:2', 'required']),
                    PostcodeField::make('postcode')
                        ->columnSpan(2)
                        ->label('Postcode')
                        ->live(debounce: 500)
                        ->rules(['required']),
                    TextInput::make('quality')
                        ->hidden()
                        ->label('Quality')
                        ->live(debounce: 500),
                    TextInput::make('eastings')
                        ->hidden()
                        ->label('Eastings')
                        ->live(debounce: 500),
                    TextInput::make('northings')
                        ->hidden()
                        ->label('Northings')
                        ->live(debounce: 500),
                    TextInput::make('country')
                        ->hidden()
                        ->label('Country')
                        ->live(debounce: 500),
                    TextInput::make('nhs_ha')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('longitude')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('latitude')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('european_electoral_region')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('primary_care_trust')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('region')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('lsoa')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('msoa')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('incode')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('outcode')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('parliamentary_constituency')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('parliamentary_constituency_2024')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('admin_district')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('parish')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('admin_county')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('date_of_introduction')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('admin_ward')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('ced')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('ccg')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('nuts')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('pfa')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('nhs_region')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('ttwa')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('national_park')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('bua')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('icb')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('cancer_alliance')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('lsoa11')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('msoa11')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('lsoa21')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('msoa21')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('oa21')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('ruc11')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('ruc21')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('lep1')
                        ->hidden()
                        ->live(debounce: 500),
                    TextInput::make('lep2')
                        ->hidden()
                        ->live(debounce: 500),
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
