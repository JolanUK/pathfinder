<?php

namespace App\Filament\Resources\Terms\Resources\Courses\RelationManagers;

use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\ModuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ModulesRelationManager extends RelationManager
{
    protected static string $relationship = 'modules';

    protected static ?string $relatedResource = ModuleResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Modules by term');
    }
}
