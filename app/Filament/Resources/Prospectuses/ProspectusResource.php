<?php

namespace App\Filament\Resources\Prospectuses;

use App\Filament\Resources\Prospectuses\Pages\CreateProspectus;
use App\Filament\Resources\Prospectuses\Pages\EditProspectus;
use App\Filament\Resources\Prospectuses\Pages\ListProspectuses;
use App\Filament\Resources\Prospectuses\Pages\ViewProspectus;
use App\Filament\Resources\Prospectuses\Schemas\ProspectusForm;
use App\Filament\Resources\Prospectuses\Schemas\ProspectusInfolist;
use App\Filament\Resources\Prospectuses\Tables\ProspectusesTable;
use App\Models\Prospectus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProspectusResource extends Resource
{
    protected static ?string $model = Prospectus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ProspectusForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProspectusInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProspectusesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProspectuses::route('/'),
            'create' => CreateProspectus::route('/create'),
            'view' => ViewProspectus::route('/{record}'),
            'edit' => EditProspectus::route('/{record}/edit'),
        ];
    }
}
