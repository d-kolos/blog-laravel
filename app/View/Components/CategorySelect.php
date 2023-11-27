<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class CategorySelect extends Component
{
    public Collection $categories;
    public int|null $categoryId;

    /**
     * Create a new component instance.
     */
    public function __construct(int $categoryId = null)
    {
        $this->categories = Category::all();
        $this->categoryId = $categoryId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-select');
    }
}
