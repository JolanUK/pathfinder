<?php

use App\Models\Page;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $slug;

    protected Page $page;

    public $content;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
    }
};
?>

<div>
    {!! mason(content: $this->page->content, bricks: \App\Mason\BrickCollection::make())->toHtml() !!}
</div>