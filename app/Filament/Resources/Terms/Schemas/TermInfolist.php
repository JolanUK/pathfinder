<?php

namespace App\Filament\Resources\Terms\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TermInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('start_date')
                    ->date(),
                TextEntry::make('end_date')
                    ->date(),
                TextEntry::make('excerpt')
                    ->columnSpanFull(),
            ]);
    }
}
