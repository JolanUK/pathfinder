<?php

namespace App\Filament\Resources\UserRoles;

use App\Filament\Resources\UserRoles\Pages\CreateUserRole;
use App\Filament\Resources\UserRoles\Pages\EditUserRole;
use App\Filament\Resources\UserRoles\Pages\ListUserRoles;
use App\Filament\Resources\UserRoles\Pages\ViewUserRole;
use App\Filament\Resources\UserRoles\Schemas\UserRoleForm;
use App\Filament\Resources\UserRoles\Schemas\UserRoleInfolist;
use App\Filament\Resources\UserRoles\Tables\UserRolesTable;
use App\Models\UserRole;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserRoleResource extends Resource
{
    protected static ?string $model = UserRole::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return UserRoleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserRoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserRolesTable::configure($table);
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
            'index' => ListUserRoles::route('/'),
            'create' => CreateUserRole::route('/create'),
            'view' => ViewUserRole::route('/{record}'),
            'edit' => EditUserRole::route('/{record}/edit'),
        ];
    }
}
