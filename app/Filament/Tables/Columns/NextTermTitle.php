<?php

namespace App\Filament\Tables\Columns;

use Filament\Tables\Columns\Column;

class NextTermTitle extends Column
{
    protected ?string $term = null;

    public function term(?string $term): static
    {
        $this->term = $term;

        return $this;
    }

    protected string $view = 'filament.tables.columns.next-term-title';
}
