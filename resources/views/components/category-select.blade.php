<?php
/** @var stdClass $post */
?>
<div class="form-group">
    <label for="category">Category</label>
    <select name="category_id" id="category" class="form-control">
        @foreach($categories as $category)
            <option @selected($category->id === $categoryId)
                value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category_id')<p class="text-danger"><small>{{ $message }}</small></p>@enderror
</div>
