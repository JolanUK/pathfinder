<?php

namespace App\Mason;

use App\Mason\Support\DefaultBrickSettings;
use Awcodes\Mason\Brick;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class Hero extends Brick
{
    public static function category(): string
    {
        return 'Content';
    }

    public static function getId(): string
    {
        return 'hero';
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
        return view('mason.hero', [
            'background_light' => $config['background_light'] ?? '#FFFFFF',
            'background_dark' => $config['background_dark'] ?? '#000000',
            'layout' => $config['layout'] ?? 'cover',
            'heading' => $config['heading'] ?? 'Heading',
            'description' => $config['description'] ?? 'Description',
            'image' => $config['image'] ?? null,
            'config' => $config,
            'data' => $data,
        ])->render();
    }

    public static function configureBrickAction(Action $action): Action
    {
        return $action
            ->slideOver()
            ->modalAutofocus(false)
            ->fillForm(fn (array $arguments): array => [
                'background_light' => $arguments['config']['background_light'] ?? '#FFFFFF',
                'background_dark' => $arguments['config']['background_dark'] ?? '#000000',
                'layout' => $arguments['config']['layout'] ?? 'cover',
                'heading' => $arguments['config']['heading'] ?? '',
                'description' => $arguments['config']['description'] ?? '',
                'image' => $arguments['config']['image'] ?? null,
            ])
            ->schema([
                ...DefaultBrickSettings::getCommonSchema(),
                Section::make()
                    ->contained(false)
                    ->extraAttributes(['class' => 'fi-sc-custom'])
                    ->label('Structure')
                    ->schema([
                        ToggleButtons::make('layout')
                            ->columns(3)
                            ->icons([
                                'cover' => Heroicon::OutlinedPhoto,
                                'columns' => Heroicon::OutlinedViewColumns,
                                'stacked' => Heroicon::OutlinedRectangleStack,
                            ])
                            ->live(debounce: 500)
                            ->options([
                                'cover' => 'Cover',
                                'columns' => 'Columns',
                                'stacked' => 'Stacked',
                            ]),
                        Toggle::make('reversed')
                            ->label('Reversed in desktops')
                            ->belowLabel('This option will set the image to the right in tablets and desktops.')
                            ->live(debounce: 500)
                            ->visible(fn (Get $get) => $get('layout') === 'columns'),
                    ]),
                Section::make()
                    ->contained(false)
                    ->extraAttributes(['class' => 'fi-sc-custom'])
                    ->label('Content')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Heading')
                            ->placeholder('Set your hero title here'),
                        RichEditor::make('description')
                            ->label('Description')
                            ->placeholder('Set your hero subtitle/content here')
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                            ]),
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(2)
                            ->label('Image')
                            ->live()
                            ->disk('public')
                            ->visibility('public'),
                    ]),
            ]);
    }
}
