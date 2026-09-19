<?php

namespace App\Filament\Resources\Locations\Widgets;

use EduardoRibeiroDev\FilamentLeaflet\Enums\TileLayer;
use EduardoRibeiroDev\FilamentLeaflet\Support\Markers\Marker;
use EduardoRibeiroDev\FilamentLeaflet\Widgets\MapWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Illuminate\Database\Eloquent\Model;

class LocationMap extends MapWidget
{
    use InteractsWithPageTable;

    public ?Model $record = null;

    protected ?string $heading = null;

    protected int $defaultZoom = 17;

    protected bool $mapZoomable = false;

    protected int $mapHeight = 600;

    protected int|string|array $columnSpan = 'full';

    protected TileLayer|string|array $tileLayersUrl = TileLayer::CartoPositron;

    protected function getMarkers(): array
    {
        return [
            Marker::fromRecord(
                record: $this->record,
                latColumn: 'latitude',
                lngColumn: 'longitude',
                popupFieldsColumns: ['address', 'phone', 'email'],
            ),
        ];
    }

    protected function getMapCenter(): array
    {
        if ($this->record && $this->record->latitude && $this->record->longitude) {
            return [$this->record->latitude, $this->record->longitude];
        }

        return $this->mapCenter;
    }
}
