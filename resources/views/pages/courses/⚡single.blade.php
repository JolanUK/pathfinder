<?php

use App\Models\Course;
use Awcodes\Mason\Support\MasonRenderer;
use Livewire\Component;

new class extends Component
{
    public $termSlug;

    public $courseSlug;

    protected Course $course;

    public $content;

    public function mount($termSlug, $courseSlug)
    {
        $this->course = Course::whereHas('terms', function ($query) use ($termSlug) {
            $query->where('slug', $termSlug);
        })->where('slug', $courseSlug)->firstOrFail();
    }
};
?>

<div>
    {{ $this->course->excerpt }}
    {!! mason($this->course->content, \App\Mason\TermCollection::make(), ['record' => $this->course])->toHtml() !!}
</div>