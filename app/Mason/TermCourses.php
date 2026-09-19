<?php

namespace App\Mason;

use App\Mason\Enums\BackgroundColor;
use Awcodes\Mason\Brick;
use Filament\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class TermCourses extends Brick
{
    public static function category(): string
    {
        return 'Term';
    }

    public static function getId(): string
    {
        return 'termCourses';
    }

    public static function getIcon(): string|Heroicon|Htmlable|null
    {
        return Heroicon::OutlinedCube;
    }

    public static function getLabel(): string
    {
        return parent::getLabel();
    }

    /**
     * @throws Throwable
     */
    public static function toHtml(array $config, ?array $data = null): ?string
    {
        $record = $data['record'] ?? null;

        return view('mason.term-courses', [
            'background_color' => $config['background_color'] ?? BackgroundColor::Primary->value,
            'config' => $config,
            'data' => $data,
            'courses' => $record?->courses,
        ])->render();
    }

    public static function configureBrickAction(Action $action): Action
    {
        return $action
            ->slideOver()
            ->fillForm(fn (array $arguments): array => [
                'background_color' => $arguments['config']['background_color'] ?? BackgroundColor::White->value,
                'heading' => $arguments['config']['heading'] ?? '',
                'subheading' => $arguments['config']['subheading'] ?? '',
            ])
            ->schema([
                Radio::make('background_color')
                    ->options(BackgroundColor::class)
                    ->inline()
                    ->dehydrateStateUsing(fn ($state) => $state?->value)
                    ->inlineLabel(false),
                TextInput::make('heading')
                    ->label('Heading')
                    ->required(),
                Textarea::make('subheading')
                    ->label('Subheading')
                    ->rows(3),
            ]);
    }
}
