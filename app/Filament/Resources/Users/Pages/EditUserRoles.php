<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\Role;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Callout;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;

class EditUserRoles extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected static ?string $title = 'Manage roles';

    protected static ?string $navigationLabel = 'Roles';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Callout::make('role-advisory')
                    ->heading('These are the actions this user is allowed to perform, based on your choices below. You should review this regularly for the security of your application.')
                    ->description(function (Get $get) {
                        $roles = $get('roles');

                        if (blank($roles)) {
                            return null;
                        }

                        $items = Role::with('permissions')
                            ->whereIn('id', (array) $roles)
                            ->get()
                            ->flatMap(fn (Role $role) => $role->permissions)
                            ->unique('id')
                            ->pluck('name')
                            ->map(fn (string $name) => '<li>'.e($name).'</li>')
                            ->implode('');

                        if ($items === '') {
                            return 'The selected roles have no permissions.';
                        }

                        return new HtmlString('<ul class="list-disc ps-5">'.$items.'</ul>');
                    })
                    ->warning()
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => filled($get('roles'))),

                CheckboxList::make('roles')
                    ->live()
                    ->relationship('roles', 'name')
                    ->columns(2)
                    ->searchable()
                    ->bulkToggleable(),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
