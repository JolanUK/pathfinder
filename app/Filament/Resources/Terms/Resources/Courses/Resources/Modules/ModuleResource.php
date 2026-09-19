<?php

namespace App\Filament\Resources\Terms\Resources\Courses\Resources\Modules;

use App\Filament\Resources\Terms\Resources\Courses\CourseResource;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Pages\CreateModule;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Pages\EditModule;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Pages\ViewModule;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Schemas\ModuleForm;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Schemas\ModuleInfolist;
use App\Filament\Resources\Terms\Resources\Courses\Resources\Modules\Tables\ModulesTable;
use App\Models\Module;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $parentResource = CourseResource::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ModuleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ModuleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModulesTable::configure($table);
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
            'create' => CreateModule::route('/create'),
            'view' => ViewModule::route('/{record}'),
            'edit' => EditModule::route('/{record}/edit'),
        ];
    }
}
