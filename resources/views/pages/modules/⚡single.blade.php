<?php

use App\Models\Module;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $termSlug;

    public $courseSlug;

    public $moduleSlug;

    protected Module $module;

    public $content;

    public function mount($termSlug, $courseSlug, $moduleSlug)
    {
        $this->module = Module::whereHas('courses.terms', function ($query) use ($termSlug) {
            $query->where('slug', $termSlug);
        })
        ->whereHas('courses', function ($query) use ($courseSlug) {
            $query->where('slug', $courseSlug);
        })
        ->where('slug', $moduleSlug)->firstOrFail();
    }
};
?>

<div>
    {!! mason($this->module->content, \App\Mason\TermCollection::make(), ['record' => $this->module])->toHtml() !!}
</div>