<?php

namespace App\View\Components\Posts;

use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TagCheckboxes extends Component
{
    public Collection $tags;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->tags = Tag::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.posts.tag-checkboxes');
    }
}
