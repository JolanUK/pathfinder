<?php

declare(strict_types=1);

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

class NewsletterSignup extends Brick
{
    public static function getId(): string
    {
        return 'newsletterSignup';
    }

    public static function getIcon(): string|Heroicon|Htmlable|null
    {
        return Heroicon::OutlinedNewspaper;
    }

    /**
     * @throws Throwable
     */
    public static function toHtml(array $config, ?array $data = null): ?string
    {
        return view('mason.newsletter-signup', [
            'background_color' => $config['background_color'] ?? BackgroundColor::Primary->value,
            'heading' => $config['heading'] ?? 'Want product news and updates? Sign up for our newsletter.',
            'subheading' => $config['subheading'] ?? '',
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
