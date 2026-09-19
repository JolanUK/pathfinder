<?php

namespace App\Filament\Resources\Participants\Tables;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ColumnManagerLayout;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ParticipantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('fullName')
                        ->extraAttributes(['class' => 'fi-ta-record-title']),
                    TextColumn::make('activeParticipant')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'active' => 'success',
                            'inactive' => 'warning',
                        })
                        ->tooltip('This badge denotes if the user has any enrolments for the current term.'),
                ])->extraAttributes(['class' => 'fi-ta-record-header']),
            ])
            ->columnManagerLayout(ColumnManagerLayout::Modal)
            ->defaultGroup('surname_initial')
            ->defaultSort(function (Builder $query): Builder {
                return $query->orderBy('surname');
            })
            ->deferColumnManager(false)
            ->deferFilters(false)
            ->filters([
                TernaryFilter::make('active')
                    ->label('Active within the current term')
                    ->placeholder('All')
                    ->trueLabel('Yes')
                    ->falseLabel('No')
                    ->queries(
                        true: fn (Builder $query) => $query->whereHas('activeEnrolments'),
                        false: fn (Builder $query) => $query->whereDoesntHave('activeEnrolments'),
                        blank: fn (Builder $query) => $query, // In this example, we do not want to filter the query when it is blank.
                    ),
            ])
            ->filtersTriggerAction(
                fn (Action $action) => $action
                    ->icon(Heroicon::AdjustmentsHorizontal)
            )
            ->groups([
                Group::make('surname_initial')
                    ->titlePrefixedWithLabel(false)
                    ->orderQueryUsing(fn ($query, $direction) => $query->orderBy('surname', $direction))
                    ->getTitleFromRecordUsing(fn ($record) => $record->surname_initial),
            ])
            ->groupRecordsTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Group records'),
            )
            ->recordActions([
                ViewAction::make()
                    ->labeledFrom('lg'),
                EditAction::make()
                    ->labeledFrom('lg'),
                DeleteAction::make()
                    ->labeledFrom('lg'),
            ])
            ->stackedOnMobile();
    }
}
