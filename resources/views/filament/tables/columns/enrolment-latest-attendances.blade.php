<div {{ $getExtraAttributeBag() }}>
    @if($record->enrolmentAttendances)
        <div class="flex gap-2">
            @foreach($record->enrolmentAttendances->slice(0, 5) as $attendance)

                <x-filament::icon-button 
                    size="xs" 
                    color="{{ $attendance->status->badgeColour() }}"
                    icon="{{ $attendance->status->badgeIcon() }}"
                    tooltip="{{ $attendance->status_reason }}">
                    <span class="hidden">{{ $attendance->status->value }}</span>
                </x-filament::icon-button>

            @endforeach
        </div>
    @endif
</div>