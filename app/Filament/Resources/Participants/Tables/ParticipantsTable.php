<?php

namespace App\Filament\Resources\Participants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ParticipantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('surname')
                    ->searchable(),
                TextColumn::make('pronouns')
                    ->hidden(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('telephone')
                    ->hidden(),
                TextColumn::make('postcode')
                    ->hidden(),
                TextColumn::make('dob')
                    ->date()
                    ->sortable(),
                IconColumn::make('emergency_consent')
                    ->boolean(),
                TextColumn::make('emergency_first_name')
                    ->searchable(),
                TextColumn::make('emergency_surname')
                    ->searchable(),
                TextColumn::make('emergency_relationship')
                    ->searchable(),
                TextColumn::make('emergency_telephone')
                    ->searchable(),
                TextColumn::make('referrer_other')
                    ->searchable(),
                TextColumn::make('disabilities')
                    ->searchable(),
                TextColumn::make('difficulties')
                    ->searchable(),
                TextColumn::make('ethnicity')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('age')
                    ->searchable(),
                IconColumn::make('declaration')
                    ->boolean(),
                IconColumn::make('surveys')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
