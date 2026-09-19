<?php

namespace App\Filament\Resources\Terms\Resources\Courses\Pages;

use App\Filament\Resources\Terms\Resources\Courses\CourseResource;
use BackedEnum;
use Carbon\Carbon;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Callout;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Override;
use Recurr\Rule;
use Recurr\Transformer\ArrayTransformer;

class CourseModules extends EditRecord
{
    protected static string $resource = CourseResource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquaresPlus;

    protected static ?string $navigationLabel = 'Modules';

    public function getDates(Set $set, Get $get)
    {
        $timezone = 'UTC';
        $start = Carbon::parse($get('start')) ?? new \DateTime(now());
        $end = Carbon::parse($get('end'));
        $count = $get('count') ?? 5;
        $frequency = $get('frequency') ?? 'DAILY';
        $day = ! empty($get('day')) ? $get('day') : ['MO', 'TU', 'WE', 'TH', 'FR'];

        $rule = (new Rule)
            ->setStartDate($start)
            ->setTimezone($timezone)
            ->setFreq($frequency)
            ->setByDay($day)
            ->setUntil($end)
            ->setCount($count);

        $transformer = new ArrayTransformer;
        $recurrences = $transformer->transform($rule);

        $data = array_map(function ($recurrence) {
            return [
                'title' => $this->record->title.' - '.$recurrence->getStart()->format('d/m/Y'),
                'excerpt' => $this->record->excerpt,
                'start' => $recurrence->getStart()->format('Y-m-d H:i:s'),
                'end' => $recurrence->getEnd() ? $recurrence->getEnd()->format('Y-m-d H:i:s') : null,
            ];
        }, $recurrences->toArray());

        $set('modules', $data);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                View::make('filament.schemas.module-bulk-creator')
                    ->columnSpanFull()
                    ->schema([
                        Section::make('dates')
                            ->columns(2)
                            ->columnSpanFull()
                            ->heading(__('Module generator'))
                            ->schema([
                                Callout::make('warning')
                                    ->columnSpanFull()
                                    ->heading(__('You should only fill out this form if the course isn\'t live yet.'))
                                    ->description(__('This is a highly destructive function, and will delete any modules you\'ve already created below. If you\'ve created modules and they have participation records associated with them, you should consider manually adding modules below instead of filling out this form again.'))
                                    ->warning(),

                                DateTimePicker::make('start')
                                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set, Get $get) {
                                        $set('start', $state);

                                        $this->getDates($set, $get);
                                    })
                                    ->displayFormat('d/m/Y')
                                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('If this field is left empty, the start date will be set to today.'))
                                    ->label(__('Start date'))
                                    ->live(debounce: 500)
                                    ->native(false),

                                DateTimePicker::make('end')
                                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set, Get $get) {
                                        $set('end', $state);

                                        $this->getDates($set, $get);
                                    })
                                    ->displayFormat('d/m/Y')
                                    ->label(__('End date (if applicable)'))
                                    ->live(debounce: 500)
                                    ->minDate(fn (Get $get): ?string => $get('start'))
                                    ->native(false),

                                Radio::make('frequency')
                                    ->afterStateHydrated(function (Radio $component, $state) {
                                        if (blank($state)) {
                                            $component->state('DAILY');
                                        }
                                    })
                                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set, Get $get) {
                                        $set('frequency', $state);

                                        $this->getDates($set, $get);
                                    })
                                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('If the course has modules that occur more than once a week, you should instead choose \'Daily\' and use the \'Day\' filter to choose specific days.'))
                                    ->options([
                                        'DAILY' => __('Daily'),
                                        'WEEKLY' => __('Weekly'),
                                        'MONTHLY' => __('Monthly'),
                                        'YEARLY' => __('Yearly'),
                                    ]),

                                CheckboxList::make('day')
                                    ->afterStateHydrated(function (CheckboxList $component, $state) {
                                        if (blank($state)) {
                                            $component->state(['MO', 'TU', 'WE', 'TH', 'FR']);
                                        }
                                    })
                                    ->afterStateUpdated(function (?array $state, ?array $old, Set $set, Get $get) {
                                        $set('day', $state);

                                        $this->getDates($set, $get);
                                    })
                                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('If your course has modules that occur every Tuesday and Wednesday for example, please check both \'Tuesday\' and \'Wednesday\'. This field allows for you to set multiple options.'))
                                    ->live(debounce: 500)
                                    ->options([
                                        'MO' => __('Monday'),
                                        'TU' => __('Tuesday'),
                                        'WE' => __('Wednesday'),
                                        'TH' => __('Thursday'),
                                        'FR' => __('Friday'),
                                        'SA' => __('Saturday'),
                                        'SU' => __('Sunday'),
                                    ]),

                                TextInput::make('count')
                                    ->afterStateHydrated(function (TextInput $component, $state) {
                                        if (blank($state)) {
                                            $component->state('5');
                                        }
                                    })
                                    ->afterStateUpdated(function (?string $state, ?string $old, Set $set, Get $get) {
                                        $set('count', $state);

                                        $this->getDates($set, $get);
                                    })
                                    ->columnSpanFull()
                                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('If you set a value here, it\'ll overwrite any of the rules you\'ve set above and will set a hard limit on how many modules will be created. If instead you\'ve set a start and end date but don\'t know specifically how many modules that will create, you should set a high value here such as 1000.'))
                                    ->live(debounce: 500)
                                    ->numeric(),
                            ]),

                        Section::make('dates')
                            ->heading(__('Generated modules'))
                            ->schema([
                                Callout::make('warning')
                                    ->columnSpanFull()
                                    ->heading(__('You are able to override the title and excerpt for individual modules below.'))
                                    ->description(__('The title and excerpt are generated from the parent course. If you\'re wanting to fine-tune any of these, such as setting specific facilitators per module or adding bulletins, please instead edit the individual module.'))
                                    ->info(),

                                Repeater::make('modules')
                                    ->afterStateUpdated(function (?array $state, ?array $old, Set $set, Get $get) {
                                        $this->getDates($set, $get);

                                        return $state;
                                    })
                                    ->columns(2)
                                    ->label(null)
                                    ->live()
                                    ->relationship('modules')
                                    ->schema([
                                        TextInput::make('title'),
                                        TextInput::make('excerpt'),
                                        DateTimePicker::make('start')
                                            ->afterStateUpdated(function (?string $state, ?string $old, Set $set) {
                                                $set('start', $state);
                                            })
                                            ->displayFormat('d/m/Y')
                                            ->live(debounce: 500)
                                            ->native(false),

                                        DateTimePicker::make('end')
                                            ->afterStateUpdated(function (?string $state, ?string $old, Set $set) {
                                                $set('end', $state);
                                            })
                                            ->displayFormat('d/m/Y')
                                            ->live(debounce: 500)
                                            ->native(false),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    #[Override]
    public function getRelationManagers(): array
    {
        return [];
    }
}
