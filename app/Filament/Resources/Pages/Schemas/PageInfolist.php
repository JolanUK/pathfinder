<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Mason\BrickCollection;
use Awcodes\Mason\MasonEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                MasonEntry::make('content')
                    ->bricks(BrickCollection::make())
                    ->previewLayout('components.layouts.mason-entry-preview')
                    ->extraInputAttributes(['style' => 'min-height: 40rem;'])
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
