<?php

namespace App\Filament\Resources\Terms\Widgets;

use App\Filament\Resources\Terms\TermResource;
use App\Filament\Tables\Columns\NextTermChecklist;
use App\Filament\Tables\Columns\NextTermTitle;
use App\Models\Term;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class NextTerm extends TableWidget
{
    protected int|string|array $columnSpan = 'half';

    public function table(Table $table): Table
    {
        $term = config('global.currentTerm');

        return $table
            ->query(fn (): Builder => Term::query()
                ->where('id', '!=', $term)
                ->orderBy('start_date', 'asc')
                ->limit(1))
            ->columns([
                Split::make([
                    NextTermTitle::make('next_title')->term($term),
                ])->extraAttributes(['class' => 'fi-ta-record-secondary']),
                Split::make([
                    NextTermChecklist::make('next_checklist'),
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
