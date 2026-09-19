<?php

namespace App\Filament\Resources\Locations\Widgets;

use App\Filament\Resources\Locations\Pages\ListLocations;
use EduardoRibeiroDev\FilamentLeaflet\Enums\TileLayer;
use EduardoRibeiroDev\FilamentLeaflet\Support\Markers\Marker;
use EduardoRibeiroDev\FilamentLeaflet\Widgets\MapWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class LocationsMap extends MapWidget
{
    use InteractsWithPageTable;

    protected ?string $heading = null;

    protected array $mapCenter = [51.452889369986345, -0.9735717364291794];

    protected int $defaultZoom = 14;

    protected bool $mapZoomable = false;

    protected int $mapHeight = 600;

    protected int|string|array $columnSpan = 'full';

    protected TileLayer|string|array $tileLayersUrl = TileLayer::CartoPositron;

    protected function getTablePage(): string
    {
        return ListLocations::class;
    }

    protected function getMarkers(): array
    {
        return $this->getPageTableRecords()->map(function ($location) {
            return Marker::fromRecord(
                record: $location,
                latColumn: 'latitude',
                lngColumn: 'longitude',
                popupFieldsColumns: ['address', 'phone', 'email'],
            );
        })->all();
    }
}
