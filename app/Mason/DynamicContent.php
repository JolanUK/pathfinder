<?php

namespace App\Mason;

use Awcodes\Mason\Brick;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

class DynamicContent extends Brick
{
    public static function getId(): string
    {
        return 'dynamicContent';
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
        return view('mason.dynamic-content', [
            'config' => $config,
            'data' => $data,
        ])->render();
    }

    public static function configureBrickAction(Action $action): Action
    {
        return $action
            ->slideOver()
            ->schema([
                Select::make('resource_types')
                    ->options(
                        collect(Filament::getResources())
                            ->mapWithKeys(fn ($resource) => [$resource => class_basename($resource)])
                            ->toArray()
                    )
                    ->live()
                    ->afterStateUpdated(fn ($set) => $set('resource', null)),
                Select::make('resources')
                    ->options(function (Get $get) {
                        $resourceType = $get('resource_types');

                        if (! $resourceType) {
                            return [];
                        }

                        $model = $resourceType::getModel();

                        return $model::query()
                            ->pluck('id', 'title')
                            ->toArray();
                    })
                    ->live()
                    ->preload(),
            ]);
    }
}
