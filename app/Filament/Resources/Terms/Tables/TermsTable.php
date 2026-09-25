<?php

namespace App\Filament\Resources\Terms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TermsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    Stack::make([
                        TextColumn::make('title')
                            ->extraAttributes(['class' => 'fi-ta-table-title'])
                            ->searchable(),
                        TextColumn::make('dateRange')
                            ->extraAttributes(['class' => 'fi-ta-table-subtitle'])
                            ->searchable(),
                    ]),
                    Stack::make([
                        TextColumn::make('status')
                            ->badge(),
                    ])
                ])
            ])
            ->defaultSort('start_date', direction: 'asc')
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
