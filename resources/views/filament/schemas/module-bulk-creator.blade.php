<?php

use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

new class extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }

    public function getDates(?array $dates): void
    {
        $this->start = $dates('start');

        dd("no");
    }
    
    public function create(): void
    {
        dd($this->form->getState());
    }
}

?>

<div>
    {{ $getChildSchema() }}
</div>