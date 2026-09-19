<?php

declare(strict_types=1);

namespace App\Mason;

use App\Mason\Enums\BackgroundColor;
use App\Mason\Enums\ColumnWidth;
use Awcodes\Mason\Brick;
use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class Grid extends Brick
{
    public static function getId(): string
    {
        return 'grid';
    }

    public static function getIcon(): string|Heroicon|Htmlable|null
    {
        return Heroicon::OutlinedSquaresPlus;
    }

    /**
     * @throws Throwable
     */
    public static function toHtml(array $config, ?array $data = null): ?string
    {
        return view('mason.grid', [
            'background_color' => $config['background_color'] ?? BackgroundColor::White->value,
            'columns_tablet' => $config['columns_tablet'] ?? ColumnWidth::Two,
            'columns_desktop' => $config['columns_desktop'] ?? ColumnWidth::Two,
            'alignment' => $config['alignment'] ?? 'top',
            'columns' => $config['columns'] ?? [],
        ])->render();
    }

    public static function configureBrickAction(Action $action): Action
    {
        return $action
            ->slideOver()
            ->modalWidth(Width::ThreeExtraLarge)
            ->fillForm(fn (array $arguments): array => [
                'background_color' => $arguments['config']['background_color'] ?? BackgroundColor::White->value,
                'columns_tablet' => $arguments['config']['columns_tablet'] ?? ColumnWidth::Two,
                'columns_desktop' => $arguments['config']['columns_desktop'] ?? ColumnWidth::Two,
                'alignment' => $arguments['config']['alignment'] ?? 'top',
                'columns' => $arguments['config']['columns'] ?? [],
            ])
            ->schema([
                Group::make([
                    Radio::make('background_color')
                        ->options(BackgroundColor::class)
                        ->inline()
                        ->inlineLabel(false),
                    Radio::make('alignment')
                        ->options([
                            'top' => 'Top',
                            'middle' => 'Middle',
                            'bottom' => 'Bottom',
                        ])
                        ->inline()
                        ->inlineLabel(false),
                ])->columns(),
                Group::make([
                    Select::make('columns_tablet')
                        ->label('Columns on Tablet')
                        ->options(ColumnWidth::class)
                        ->dehydrateStateUsing(fn ($state) => $state->value)
                        ->required(),
                    Select::make('columns_desktop')
                        ->label('Columns on Desktop')
                        ->options(ColumnWidth::class)
                        ->dehydrateStateUsing(fn ($state) => $state->value)
                        ->required(),
                ])->columns(),
                Repeater::make('columns')
                    ->columnSpanFull()
                    ->collapsible()
                    ->itemLabel(fn (): string => 'Column')
                    ->itemNumbers()
                    ->schema([
                        CheckboxList::make('visibility')
                            ->hiddenLabel()
                            ->columns(3)
                            ->bulkToggleable()
                            ->options([
                                'mobile' => 'Visible on Mobile',
                                'tablet' => 'Visible on Tablet',
                                'desktop' => 'Visible on Desktop',
                            ])
                            ->default([
                                'mobile',
                                'tablet',
                                'desktop',
                            ]),
                        RichEditor::make('text')
                            ->disableToolbarButtons([
                                'underline',
                                'codeBlock',
                                'subscript',
                                'blockquote',
                                'table',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->addActionLabel('Add column'),
            ]);
    }
}
