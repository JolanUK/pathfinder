<?php

namespace App\Filament\Resources\Participants\Widgets;

use App\Filament\Resources\Participants\Pages\ListParticipants;
use EduardoRibeiroDev\FilamentLeaflet\Enums\TileLayer;
use EduardoRibeiroDev\FilamentLeaflet\Support\Markers\Marker;
use EduardoRibeiroDev\FilamentLeaflet\Widgets\MapWidget;
use Filament\Widgets\Concerns\InteractsWithPageTable;

class ParticipantsMap extends MapWidget
{
    use InteractsWithPageTable;

    protected ?string $heading = null;

    protected array $mapCenter = [51.452889369986345, -0.9735717364291794];

    protected int $defaultZoom = 12;

    protected bool $mapZoomable = false;

    protected int $mapHeight = 500;

    protected int|string|array $columnSpan = 'full';

    protected TileLayer|string|array $tileLayersUrl = TileLayer::CartoPositron;

    protected function getTablePage(): string
    {
        return ListParticipants::class;
    }

    protected function getMarkers(): array
    {
        // Get the paginated records directly
        $paginator = $this->getPageTableRecords();

        // Get the items from the current page
        $records = $paginator->getCollection();

        return $records
            ->filter(function ($participant) {
                return ! is_null($participant->latitude) && ! is_null($participant->longitude);
            })
            ->map(function ($participant) {
                return Marker::fromRecord(
                    record: $participant,
                    latColumn: 'latitude',
                    lngColumn: 'longitude',
                    popupFieldsColumns: ['address', 'phone', 'email'],
                )
                    ->color($participant->active_participant == 'active' ? 'oklch(0.527 0.154 150.069)' : 'oklch(0.828 0.189 84.429)')
                    ->popupTitle($participant->getFullNameAttribute())
                    ->popupFields([
                        'address' => $participant->address,
                        'phone' => $participant->telephone,
                        'email' => $participant->email,
                    ])
                    ->popupOptions(['maxWidth' => 300]);
            })
            ->values()
            ->all();
    }
}
