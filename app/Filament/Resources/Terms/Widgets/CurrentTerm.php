<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Filament\Resources\Terms\TermResource;
use App\Filament\Tables\Columns\CurrentTermStats;
use App\Filament\Tables\Columns\CurrentTermTitle;
use App\Models\Term;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class CurrentTerm extends TableWidget
{
    protected int|string|array $columnSpan = 'half';

    public function table(Table $table): Table
    {
        $term = config('global.currentTerm');

        return $table
            ->query(fn (): Builder => Term::query()
                ->where('id', $term))
            ->columns([
                Split::make([
                    CurrentTermTitle::make('current_title')->term($term),
                ])->extraAttributes(['class' => 'fi-ta-record-secondary']),
                Split::make([
                    CurrentTermStats::make('current_stats'),
                ])->extraAttributes(['class' => 'fi-ta-record-secondary']),
            ])
            ->groups([])
            ->paginated(false)
            ->filters([
                //

            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                Action::make('url')
                    ->button()
                    ->extraAttributes(['class' => 'fi-btn-empty'])
                    ->label('Preview')
                    ->url(fn ($record) => route('terms.single', ['slug' => $record->slug])),
                Action::make('edit')
                    ->button()
                    ->label('Edit')
                    ->url(fn (Term $record): string => TermResource::getUrl('edit', ['record' => $record])),
            ], position: RecordActionsPosition::AfterContent)
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ])
            ->extraAttributes(['class' => 'fi-ta-custom-table']);
    }
}
