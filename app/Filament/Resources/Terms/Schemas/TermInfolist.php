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
                TextEntry::make('start')
                    ->date(),
                TextEntry::make('end')
                    ->date(),
                TextEntry::make('excerpt')
                    ->columnSpanFull(),
            ]);
    }
}
