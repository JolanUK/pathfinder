<?php

use App\Models\Page;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $pageSlug;

    protected Page $page;

    public $content;

    public function mount($pageSlug)
    {
        $this->page = Page::where('slug', $pageSlug)->firstOrFail();
    }
};
?>

<div>
    {!! mason(content: $this->page->content, bricks: \App\Mason\BrickCollection::make())->toHtml() !!}
</div>