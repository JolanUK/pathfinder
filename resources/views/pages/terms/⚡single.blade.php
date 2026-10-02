<?php

use App\Models\Term;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $termSlug;

    protected Term $term;

    public $content;

    public function mount($termSlug)
    {
        $this->term = Term::where('slug', $termSlug)->firstOrFail();
    }
};
?>

<div>
    {!! mason($this->term->content, \App\Mason\TermCollection::make(), ['record' => $this->term])->toHtml() !!}
</div>