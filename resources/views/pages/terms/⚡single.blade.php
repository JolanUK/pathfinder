<?php

use App\Models\Term;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $slug;

    protected Term $term;

    public $content;

    public function mount($slug)
    {
        $this->term = Term::where('slug', $slug)->firstOrFail();
    }
};
?>

<div>
    {!! mason($this->term->content, \App\Mason\TermCollection::make(), ['record' => $this->term])->toHtml() !!}
</div>