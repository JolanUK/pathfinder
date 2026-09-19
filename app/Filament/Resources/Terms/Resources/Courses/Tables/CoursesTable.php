<?php

namespace App\Filament\Resources\Terms\Resources\Courses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('course_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Workshop' => 'success',
                        'DropIn' => 'info',
                    }),
                TextColumn::make('terms.title')
                    ->bulleted()
                    ->limitList(5)
                    ->listWithLineBreaks(true),
                TextColumn::make('minimum_participants')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('maximum_participants')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->columnManager(false)
            ->defaultGroup('course_type')
            ->defaultSort(function (Builder $query): Builder {
                return $query->orderBy('title');
            })
            ->groupingSettingsHidden(true)
            ->groups([
                Group::make('course_type')
                    ->titlePrefixedWithLabel(false)
                    ->getTitleFromRecordUsing(fn ($record) => $record->course_type),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->searchable(false)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
