<?php

namespace App\Filament\Resources\Terms\Resources\Courses\RelationManagers;

use App\Filament\Resources\Terms\TermResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TermsRelationManager extends RelationManager
{
    protected static string $relationship = 'terms';

    protected static ?string $relatedResource = TermResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                AttachAction::make(),
                CreateAction::make(),
            ])
            ->searchable(false);
    }

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Terms this course appears in');
    }
}
