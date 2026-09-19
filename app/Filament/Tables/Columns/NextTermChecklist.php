<?php

namespace App\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;

class NextTermChecklist extends Column
{
    public function getCourses()
    {
        return $this->record->courses;
    }

    public function getContent()
    {
        return $this->record->content;
    }

    protected string $view = 'filament.tables.columns.next-term-checklist';
}
